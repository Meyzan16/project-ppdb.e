@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Biodata Diri {{ $item->name }}</h3>
          <h6 class="font-weight-normal mb-0">

            @if($item->nik == '')
              Silahkan perbarui data terlebih dahulu
            @else
            <span>Silahkan perbarui data biodata diri tambahan </span>
            @endif



          </h6>
        </div>
        <div class="col-12 col-xl-4">
         <div class="justify-content-end d-flex">
       
            <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             <i class="mdi mdi-calendar"></i> 
             <?php  $tgl=date('l, d-m-Y'); ?>
             {{ $tgl; }}
            </button>
         </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
    
        @if($item->nik == '')
            <button class="btn btn-primary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Anda</button>
        @elseif($item->jenkel != '')

        @else 
            <button class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Tambahan </button>
        @endif
         
          {{-- dimunculkan jika data di tabel siswa sudah terisi --}}
          {{-- <button type="button" class="btn btn-secondary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Ortu</button>
          <button type="button" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Lengkapi Berkas</button> --}}
      </div>
  </div>

      @if (session()->has('success'))
      <div class="row">
        <div class="col-md-6">
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        </div>
      </div>
      @endif


    @if ($item->nik == '')
        <div class="row">
          <div class="col-md-6 grid-margin stretch-card" >
              <div class="card tale-bg">
                  <div class="card-body">
                  <h4 class="card-title">Form Data Utama</h4>
                  <p class="card-description text-danger">
                      Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
                  </p>

                  <form class="forms-sample" action="{{ route('biodataStore', [$item->nisn]) }}"  method="POST">
                    {{ method_field('PATCH') }}
                    @csrf
                      <div class="form-group">
                      <label>Nisn</label>
                      <input type="text" name="nisn" style="border-radius: 30px" readonly class="form-control  @error('nisn')is-invalid @enderror"  placeholder="NISN"  value="{{ $item->nisn }}">
                      <p class="text-danger" style="font-size: 13px">Silahkan perbarui nisn sama admin jika ada kesalahan</p>
                      @error('nisn') 
                            <div class="invalid-feedback">
                              kesalahan : {{ $message }}
                            </div>
                      @enderror
                    </div>

                      <div class="form-group">
                      <label>Nik</label>
                      <input type="text" name="nik" style="border-radius: 30px" required class="form-control  @error('nik')is-invalid @enderror"  placeholder="NIK" value="{{ old('nik') }}">
                          @error('nik') 
                          <div class="invalid-feedback">
                            kesalahan : {{ $message }}
                          </div>
                      @enderror
                    </div>

                      <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="name" style="border-radius: 30px" required class="form-control  @error('name')is-invalid @enderror"  placeholder="NAMA" value="{{ $item->name; }}">
                      <p class="text-danger" style="font-size: 13px">Silahkan perbarui nama jika ada kesalahan</p>
                      @error('name') 
                      <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                      </div>
                    @enderror  
                    </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" style="border-radius: 30px" required class="form-control  @error('username')is-invalid @enderror"  placeholder="USERNAME"  value="{{ old('username') }}" >
                        @error('username') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                    @enderror
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" style="border-radius: 30px" required  class="form-control  @error('password')is-invalid @enderror"  placeholder="PASSWORD"  >
                        <p class="text-danger" style="font-size: 13px">Disarankan untuk perbarui password </p>
                        @error('password') 
                            <div class="invalid-feedback">
                              kesalahan : {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group">
                      <label >Email</label>
                      <input type="email" name="email" style="border-radius: 30px" required class="form-control  @error('email')is-invalid @enderror"  placeholder="EMAIl" value="{{ old('email') }}">
                      @error('email') 
                          <div class="invalid-feedback">
                            kesalahan : {{ $message }}
                          </div>
                      @enderror
                    </div>

                      <button type="submit" class="btn btn-primary mr-2" style="border-radius: 30px;" onclick="return confirm('Apakah data anda sudah benar ?')" >Kirim</button>
                      <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
                  </form>
                  
                  </div>
              </div>
                
          </div>
        </div>
    @elseif($item->jenkel != '')
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-body">
            <h5 class="card-title text-center" style="color: green; font-size:20px;">Selamat anda sudah melengkapi data biodata diri</h5>
            <h4 class="card-title text-center" style="color: black; font-size:20px;">sekarang data anda {{ $item->status_tb_biodata }} </h4>
            <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
          </div>
        </div>
      </div>
    </div>
    @else
      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-body">
              <h4 class="card-title">Form Data Tambahan</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
            <form class="forms-sample" action="{{ route('datatambahan.update', [$item->nisn]) }}" method="POST">
              {{ method_field('PATCH') }}
              @csrf

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenkel" class="form-control @error('jenkel') is-invalid @enderror" >
                  <option value="">Pilih Data </option>
                  <option value="L" @if (old('jenkel') == "L") {{ 'selected' }} @endif> Pria   </option>
                  <option value="P" @if (old('jenkel') == "P") {{ 'selected' }} @endif> Wanita </option>
                </select>
                @error('jenkel') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror

              </div>

              <div class="form-group">
                <label>Tempat Lahir</label>
                <textarea  name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid  @enderror" value="{{ old('tempat_lahir') }}" >{{ old('tempat_lahir') }}</textarea>
                @error('tempat_lahir') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Tanggal lahir</label>
                <input  type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}"></input>
                @error('tgl_lahir') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Jumlah Saudara Kandung</label>
                <input  type="number"  name="jml_sdr_kdg" class="form-control @error('jml_sdr_kdg') is-invalid @enderror" value="{{ old('jml_sdr_kdg') }}" />
                @error('jml_sdr_kdg') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <label>Anak Keberapa</label>
                <input  type="number"  name="anak_keberapa" class="form-control @error('anak_keberapa') is-invalid @enderror" value="{{ old('anak_keberapa') }}" />
                    @error('anak_keberapa') 
                    <div class="invalid-feedback">
                      kesalahan : {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="form-group">
                <label>Agama</label>
                <select name="agama_id" class="form-control @error('agama_id') is-invalid @enderror" >
                  <option value="">--Pilih Data--</option>   
                  @foreach ($agama as $agama)
                          @if(old('agama_id') == $agama->id )
                            <option value="{{ $agama->id }}" selected>{{ $agama->nama }}</option>      
                          @else
                            <option value="{{ $agama->id }}">{{ $agama->nama }}</option>    
                          @endif
                      @endforeach
                  </select>
                    @error('agama_id')
                <div class="invalid-feedback">
                  kesalahan : {{ $message }}
                </div>
                @enderror
              </div>

              <div class="form-group">
                <label>No registrasi akta lahir</label>
                <input  type="text"  name="no_akte" class="form-control @error('no_akte') is-invalid @enderror" value="{{ old('no_akte') }}" />
                @error('no_akte') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror
                <span class="text-danger" style="font-size:10px">Silahkan input no akte sesuai dengan data anda </span>
              </div>

              <div class="form-group" id="kewarganegaraan">
                <label>kewarganegaraan</label>
                <p class="text-muted"></p>
                  <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        class="custom-control-input"
                        name="is_kewarganegaraan"
                        id="open_kwr"
                        required
                        value="WNI"
                      />
                      <label for="open_kwr" class="custom-control-label">
                        WNI
                      </label>
                  </div>

                  <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                      type="radio"
                      class="custom-control-input"
                      name="is_kewarganegaraan"
                      id="close_kwr"
                      required
                      value="WNA"
                      />
                      <label for="close_kwr" class="custom-control-label">
                        WNA
                      </label>
                  </div>
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" > {{ old('alamat') }}</textarea>
                @error('alamat') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label>Rt</label>
                  <input  type="number" minlength="1" maxlength="3"  name="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ old('rt') }}" />
                      @error('rt') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                      @enderror
                  <span class="text-danger" style="font-size: 10px">Boleh dikosongkan</span>
                </div>

                <div class="form-group col-6">
                  <label>Rw</label>
                  <input  type="number" minlength="1" maxlength="3"  name="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw') }}" />
                      @error('rw') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                      @enderror
                  <span class="text-danger" style="font-size: 10px">Boleh dikosongkan</span>
                </div>
              </div>

              <div class="form-group">
                <label>Nama Dusun</label>
                <input  type="text"  name="nama_dusun" class="form-control @error('nama_dusun') is-invalid @enderror" value="{{ old('nama_dusun') }}" />
                      @error('nama_dusun') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                      @enderror
              </div>

              <div class="form-group">
                <label>Nama Kelurahan / Desa</label>
                <input  type="text"  name="kelurahan_desa" class="form-control @error('kelurahan_desa') is-invalid @enderror" value="{{ old('kelurahan_desa') }}" />
                      @error('kelurahan_desa') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                      @enderror
              </div>

              <div class="form-group">
                <label>Kecamatan</label>
                <input  type="text"  name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan') }}" />
                      @error('kecamatan') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                      @enderror
              </div>

              <div class="form-group">
                <label>Kode Pos</label>
                <input  type="text"  name="kode_pos" class="form-control @error('kode_pos') is-invalid @enderror" value="{{ old('kode_pos') }}" />
                      @error('kode_pos') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                      @enderror
              </div>     

              <div class="form-group">
                <label>Tempat tinggal</label>
                <select name="jenis_tinggal" required class="form-control @error('jenis_tinggal') is-invalid @enderror ">
                  <option value="">--Pilih Data--</option>
                  @foreach ($jenis_tinggal as $jenis_tinggal)
                      @if(old('jenis_tinggal') == $jenis_tinggal->id )
                        <option value="{{ $jenis_tinggal->id }}" selected>{{ $jenis_tinggal->nama }}</option>      
                      @else
                        <option value="{{ $jenis_tinggal->id }}">{{ $jenis_tinggal->nama }}</option>    
                      @endif
                  @endforeach
                </select>

                @error('jenis_tinggal') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror
              </div> 

              <div class="form-group">
                <label>Mode Tranportasi</label>
                <select name="mode_transportasi" required class="form-control @error('mode_transportasi') is-invalid @enderror">
                  <option value="">--Pilih Data--</option>
                  @foreach ($mode_trans as $mode_trans)
                    @if(old('mode_transportasi') == $mode_trans->id )
                      <option value="{{ $mode_trans->id }}" selected>{{ $mode_trans->nama }}</option>      
                    @else
                      <option value="{{ $mode_trans->id }}">{{ $mode_trans->nama }}</option>    
                    @endif
                 @endforeach
                  
                </select>
                @error('mode_transportasi') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror
              </div> 

              <div class="form-group">
                <label>Nomor Hp</label>
                <input type="text" minlength="12" maxlength="13" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror" autocomplete  name="no_hp"  />
                @error('no_hp') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>
                @enderror
              </div> 

              <div class="form-group" id="KKS" >
                <label>Penerima Kartu Kelurga Sejahtera</label>
                <p class="text-muted"></p>
                  <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        class="custom-control-input"
                        name="status_KKS"
                        id="openKKSTrue"
                        {{-- required --}}   
                        v-model="status_KKS"
                        :value="true"
                      />
                      <label for="openKKSTrue" class="custom-control-label">
                        Ada
                      </label>
                  </div>

                  <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        class="custom-control-input"
                        name="status_KKS"
                        id="openKKSFalse"
                        {{-- required --}}
                        v-model="status_KKS"
                        :value="false"
                      />
                      <label for="openKKSFalse" class="custom-control-label">
                        Tidak Ada
                      </label>
                  </div>
                  <br>
                  <span class="text-danger" style="font-size: 10px">Nomor Kartu Keluarga Sejahtera (jika memiliki). Nomor yang dimaksud adalah 6 digit kode yang tertera pada sisi belakang kiri atas kartu (di bawah
                    lambang Garuda Pancasila).
                    Peserta didik dinyatakan sebagai anggota KKS apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KKS. Sebagai contoh,
                    peserta didik tercantum pada KK dengan kepala keluarganya adalah kakek. Apabila kakek peserta didik tersebut pemegang KKS, maka nomor KKS
                    milik kakek peserta didik yang bersangkutan dapat diisikan pada kolom ini</span>
             
                    
                    <div class="form-group" v-if="status_KKS">
                      <label>Nomor Kartu KKS</label>
                      <input type="text" maxlength="6" value="{{ old('nomor_kks') }}" class="form-control @error('nomor_kks') is-invalid @enderror" autocomplete  name="nomor_kks"  />
                      @error('nomor_kks') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                      @enderror
                    </div>
              </div>

              <div class="form-group" id="pkh" >
                <label>Penerima KPS/PKH</label>
                <p class="text-muted"></p>
                  <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        class="custom-control-input"
                        name="is_store_open_pkh"
                        id="openPKHTrue"
                        v-model="is_store_open_pkh"
                        :value="true"
                      />
                      <label for="openPKHTrue" class="custom-control-label">
                        Ada
                      </label>
                  </div>

                  <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        class="custom-control-input"
                        name="is_store_open_pkh"
                        id="openPKHFalse"
                        v-model="is_store_open_pkh"
                        :value="false"
                      />
                      <label for="openPKHFalse" class="custom-control-label">
                        Tidak Ada
                      </label>
                  </div>

                  <br>
                  <span class="text-danger" style="font-size: 10px">Status peserta didik sebagai penerima manfaat KPS (Kartu Perlindungan Sosial)/PKH (Program Keluarga Harapan). Peserta didik
                    dinyatakan sebagai penerima KPS/PKH apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KPS/PKH.
                    Sebagai contoh, peserta didik tercantum pada KK dengan kepala keluarganya adalah kakek. Apabila kakek peserta didik tersebut
                    pemegang KPS/PKH, maka peserta didik yang bersangkutan dinyatakan penerima KPS/PKH.</span>
   
                  <div class="form-group" v-if="is_store_open_pkh">
                    <label>Nomor Kartu KPS/PKH</label>
                    <input type="text" maxlength="6" minlength="6" value="{{ old('nomor_KPS_PKH') }}" class="form-control @error('nomor_KPS_PKH') is-invalid @enderror" autocomplete  name="nomor_KPS_PKH"  />
                    @error('nomor_KPS_PKH') 
                      <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                      </div>
                    @enderror
                    <span class="text-danger" style="font-size: 10px">Nomor KPS atau PKH yang masih berlaku jika sebelumnya dipilih sebagai penerima KPS/PKH</span>
                  </div>  
              </div>

              <div class="form-group" id="kip" >
                <label>Penerima KIP</label>
                <p class="text-muted"></p>
                  <div
                      class="custom-control custom-radio custom-control-inline"
                    >
                      <input
                        type="radio"
                        class="custom-control-input"
                        name="is_store_open_kip"
                        id="openKIPTrue"
                        v-model="is_store_open_kip"
                        :value="true"
                      />
                      <label for="openKIPTrue" class="custom-control-label">
                        Ada
                      </label>
                  </div>

                  <div
                                class="custom-control custom-radio custom-control-inline"
                              >
                                <input
                                  type="radio"
                                  class="custom-control-input"
                                  name="is_store_open_kip"
                                  id="openKIPFalse"
                                  v-model="is_store_open_kip"
                                  :value="false"
                                />
                                <label for="openKIPFalse" class="custom-control-label">
                                  Tidak Ada
                                </label>
                    </div>

                  <br>
                  <div class="form-group" v-if="is_store_open_kip">
                    <label>Nomor Kartu KIP</label>
                    <input type="text" maxlength="6" minlength="6" value="{{ old('nomor_kip') }}" class="form-control @error('nomor_kip') is-invalid @enderror" autocomplete  name="nomor_kip"  />
                    @error('nomor_kip') 
                      <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                      </div>
                    @enderror
                    <span class="text-danger" style="font-size: 10px">Nomor KIP milik peserta didik apabila sebelumnya telah dipilih sebagai penerima KIP. Nomor yang dimaksud adalah 6 digit kode yang tertera pada
                      sisi belakang kanan atas kartu (di bawah lambang toga)</span>
                  </div> 

                  <div class="form-group" v-if="is_store_open_kip">
                    <label>Nama Lengkap KIP</label>
                    <input type="text" maxlength="50" value="{{ old('nama_kip') }}" class="form-control @error('nama_kip') is-invalid @enderror" autocomplete  name="nama_kip"  />
                    @error('nama_kip') 
                      <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                      </div>
                    @enderror
                    <span class="text-danger" style="font-size: 10px">Nama yang tertera pada KIP milik peserta didik</span>
                  </div> 
              </div>

              <div class="form-group">
                <label>Berat Badan</label>
                <input type="number" maxlength="3" value="{{ old('berat_badan') }}" class="form-control @error('berat_badan') is-invalid @enderror" autocomplete  name="berat_badan"  />
                          @error('berat_badan') 
                            <div class="invalid-feedback">
                              kesalahan : {{ $message }}
                            </div>
                          @enderror
              </div>

              <div class="form-group">
                <label>tinggi badan</label>
                          <input type="number" maxlength="3" value="{{ old('tinggi_badan') }}" class="form-control @error('tinggi_badan') is-invalid @enderror" autocomplete  name="tinggi_badan"  />
                          @error('tinggi_badan') 
                            <div class="invalid-feedback">
                              kesalahan : {{ $message }}
                            </div>
                          @enderror
              </div>

              <div class="form-group row">
                <div class="col-8">
                  <label>Jarak rumah kesekolah</label>
                  <input type="number" maxlength="5" value="{{ old('jarak_rumah_sekolah') }}" class="form-control @error('jarak_rumah_sekolah') is-invalid @enderror" autocomplete  name="jarak_rumah_sekolah"  />
                  @error('jarak_rumah_sekolah') 
                    <div class="invalid-feedback">
                      kesalahan : {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="form-group col-2">
                  <br> <br>
                  <p style="font-size: 16px">Meter </p>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-8">
                  <label>waktu tempuh</label>
                  <input type="number" maxlength="5" value="{{ old('waktu_tempuh') }}" class="form-control @error('waktu_tempuh') is-invalid @enderror" autocomplete  name="waktu_tempuh"/> 
                  @error('waktu_tempuh') 
                    <div class="invalid-feedback">
                      kesalahan : {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-2">
                  <br> <br>
                  <p style="font-size: 16px">Menit </p>
                </div>
              </div>







                       
                      
                <button type="submit" class="btn btn-primary mr-2" style="border-radius: 30px;" onclick="return confirm('Apakah data anda sudah benar ?')" >Kirim</button>
                <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
              </form>
                
            </div>
          </div>
        </div>
      </div>
    @endif

  

  
  <div class="row">
  </div>

</div>

@endsection

@push('addon-script')

<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
  Vue.use(Toasted);


  var kks = new Vue({
    el: "#KKS",
    mounted() {
      AOS.init();
    },
    data: {
      status_KKS: true,
      nomor_kks: "",
    }
  });

  var pkh = new Vue({
    el: "#pkh",
    mounted() {
      AOS.init();
    },
    data: {
      is_store_open_pkh: true,
      name_pkh: "",
    }
  });
  var kip = new Vue({
    el: "#kip",
    mounted() {
      AOS.init();
    },
    data: {
      is_store_open_kip: true,
      name_kip: "",
    },
  });
  
</script>
@endpush
