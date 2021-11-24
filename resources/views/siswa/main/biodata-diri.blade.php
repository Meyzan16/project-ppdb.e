@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Biodata Diri</h3>
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
                  <h4 class="card-title">Data Utama</h4>
                  <p class="card-description text-danger">
                      Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
                  </p>

                  <form class="forms-sample" action="{{ route('biodataStore', $item->nisn) }}"  method="POST">
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
                      <input type="text" name="email" style="border-radius: 30px" required class="form-control  @error('email')is-invalid @enderror"  placeholder="EMAIl" value="{{ old('email') }}">
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


    @else
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card" id="kewarganegaraan">
          <div class="card tale-bg">
            <div class="card-body">
              <h4 class="card-title">Data Tambahan</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
              <form class="forms-sample">

                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jenkel" class="form-control" required>
                    <option value="">Pilih Data </option>
                    <option value="L"> Pria   </option>
                    <option value="P"> Wanita </option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Tempat Lahir</label>
                  <textarea name="tempat_lahir" class="form-control"></textarea>
                </div>

                <div class="form-group">
                  <label>Tanggal lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control"></input>
                </div>

                <div class="form-group">
                  <label>Jumlah Saudara Kandung</label>
                  <input type="number"  name="jml_sdr_kdg" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Anak Keberapa</label>
                  <input type="text"  name="anak_keberapa" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Agama</label>
                  <select name="jenkel" class="form-control" required>
                    <option value="">Pilih Data </option>
                    <option value="Islam"> Islam   </option>
                    <option value="Kristen/ Protestan">Kristen/ Protestan </option>
                    <option value="Katholik">Katholik </option>
                    <option value="Hindu">Hindu </option>
                    <option value="Budha">Budha </option>
                    <option value="Khonghucu">Khonghucu </option>
                  </select>
                </div>

                <div class="form-group">
                  <label>No registrasi akta lahir</label>
                  <input type="text" name="no_akte" class="form-control"></input>
                  <span class="text-danger" style="font-size:10px">Silahkan input no akte sesuai dengan data anda </span>
                </div>

                <div class="form-group">
                  <label>kewarganegaraan</label>
                  <p class="text-muted"></p>
                    <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          class="custom-control-input"
                          name="is_store_open"
                          id="openStorefalse"
                          v-model="is_store_open"
                          :value="false"
                        />
                        <label for="openStorefalse" class="custom-control-label">
                          WNI
                        </label>
                    </div>

                    <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          class="custom-control-input"
                          name="is_store_open"
                          id="openStoreTrue"
                          v-model="is_store_open"
                          :value="true"
                        />
                        <label for="openStoreTrue" class="custom-control-label">
                          WNA
                        </label>
                    </div>
                    
                </div>

                <div class="form-group" v-if="is_store_open">
                  <label>Nama Negara</label>
                  <input name="negara_wna" type="text" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control"></textarea>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label>Rt</label>
                    <input type="text" name="rt" class="form-control">
                    <span class="text-danger" style="font-size: 10px">Boleh dikosongkan</span>
                  </div>

                  <div class="form-group col-6">
                    <label>Rw</label>
                    <input type="text" name="rw" class="form-control">
                    <span class="text-danger" style="font-size: 10px">Boleh dikosongkan</span>
                  </div>
                </div>

                <div class="form-group">
                  <label>Nama Dusun</label>
                  <input type="text" name="nama_dusun" class="form-control">
                </div>

                <div class="form-group">
                  <label>Nama Kelurahan / Desa</label>
                  <input type="text" name="kelurahan_desa" class="form-control">
                </div>

                <div class="form-group">
                  <label>Kecamatan</label>
                  <input type="text" name="kecamatan" class="form-control">
                </div>

                <div class="form-group">
                  <label>Kode Pos</label>
                  <input type="text" name="kode_pos" class="form-control">
                </div>                  
            </div>
          </div>
        </div>


        <div class="col-md-6 grid-margin stretch-card" id="register">
          <div class="card tale-bg">
            <div class="card-body">
              <h4 class="card-title">Data Tambahan</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>

                  <div class="form-group">
                    <label>Tempat tinggal</label>
                    <select name="jenis_tinggal" class="form-control" required>
                      <option value="">Pilih Data </option>
                      <option value="Bersama orang tua"> Bersama orang tua</option>
                      <option value="Wali">Wali </option>
                      <option value="Kos">Kos </option>
                      <option value="Asrama">Asrama </option>
                      <option value="Panti Asuhan">Panti Asuhan </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Mode Tranportasi</label>
                    <select name="mode_transportasi" class="form-control" required>
                      <option value="">Pilih Data </option>
                      <option value="Jalan kaki"> Jalan kaki</option>
                      <option value="Kendaraan pribadi">Kendaraan pribadi </option>
                      <option value="Kendaraan Umum/angkot">Kendaraan Umum/angkot </option>
                      <option value="Jemputan Sekolah">Jemputan Sekolah </option>
                      <option value="Andong/Bendi/Sado/Dokar/Delman/Beca">Andong/Bendi/Sado/Dokar/Delman/Beca </option>
                      <option value="Perahu penyebrangan/Rakit/Getek">Perahu penyebrangan/Rakit/Getek </option>
                    </select>
                  </div>
                  
                  {{-- KKS --}}
                <div class="form-group">
                  <label>Penerima Kartu Kelurga Sejahtera</label>
                  <p class="text-muted"></p>

                    <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          class="custom-control-input"
                          name="is_store_open_kks"
                          id="openKKSTrue"
                          v-model="is_store_open_kks"
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
                          name="is_store_open_kks"
                          id="openKKSFalse"
                          v-model="is_store_open_kks"
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
                </div>

                <div class="form-group" v-if="is_store_open_kks">
                  <label>Nomor Kartu KKS</label>
                  <input type="text" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Nomor Hp</label>
                  <input type="text" name="no_hp" class="form-control" />
                </div>

                

                 {{-- PKH --}}
                <div class="form-group">
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
                </div>

               
                <div class="form-group" v-if="is_store_open_pkh">
                  <label>Nomor Kartu KPS/PKH</label>
                  <input type="text" class="form-control" />
                  <span class="text-danger" style="font-size: 10px">Nomor KPS atau PKH yang masih berlaku jika sebelumnya dipilih sebagai penerima KPS/PKH</span>
                </div>      

                {{-- KIP --}}
                <div class="form-group">
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
                </div>

                <div class="form-group" v-if="is_store_open_kip">
                  <label>Nomor Kartu KIP</label>
                  <input type="text" class="form-control" />
                  <span class="text-danger" style="font-size: 10px">Nomor KIP milik peserta didik apabila sebelumnya telah dipilih sebagai penerima KIP. Nomor yang dimaksud adalah 6 digit kode yang tertera pada
                    sisi belakang kanan atas kartu (di bawah lambang toga)</span>
                </div> 

                <div class="form-group" v-if="is_store_open_kip">
                  <label>Nama Lengkap KIP</label>
                  <input type="text" class="form-control" />
                  <span class="text-danger" style="font-size: 10px">Nama yang tertera pada KIP milik peserta didik</span>
                </div> 

                <div class="form-group">
                  <label>Berat Badan</label>
                  <input type="number" name="berat_badan" class="form-control" />
                </div>

                <div class="form-group">
                  <label>tinggi badan</label>
                  <input type="number"  name="tinggi_badan" class="form-control" />
                </div>

                <div class="form-group">
                  <label>Jarak rumah kesekolah</label>
                  <input type="number"  name="jarak_rumah_sekolah" class="form-control" />
                </div>

                <div class="form-group">
                  <label>waktu tempuh</label>
                  <input type="number"  name="waktu_tempuh" class="form-control" />
                </div>
                
                
                

                

                <button type="submit" class="btn btn-primary mr-2" style="border-radius: 30px;" onclick="return confirm('Apakah data anda sudah benar ?')" >Kirim</button>
                <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
              </form>
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

  var kewarganegaraan = new Vue({
    el: "#kewarganegaraan",
    mounted() {
      AOS.init();
    },

    data: {
      is_store_open: true,
      store_name: "",
    },
  });

  var register = new Vue({
    el: "#register",
    mounted() {
      AOS.init();
    },

    data: {
      is_store_open_kks: true,
      is_store_open_pkh: true,
      is_store_open_kip: true,
      store_name: "",
    },
  });


  
</script>
@endpush