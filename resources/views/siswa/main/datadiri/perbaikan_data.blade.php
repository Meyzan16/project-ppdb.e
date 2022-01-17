@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Perbaikan Data Biodata Diri {{ $item->user->name }}</h3>
          <h6 class="font-weight-normal mb-0">
            <span>Silahkan perbaiki data yang terdapat kesalahan </span>
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
        <button type="button" class="mb-2 btn btn-outline-primary block" data-toggle="modal" data-target="#exampleModalCenter">
            &nbsp;Catatan Kesalahan
        </button>
        
        <div class="col">
            <button type="button" class="mb-2 btn btn-outline-primary block" data-toggle="modal" data-target="#petunjuk">
                &nbsp;Baca Petunjuk
            </button>
        </div>
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

      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-body">
              <h4 class="card-title">Form Pebaikan Biodata Diri</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
            <form class="forms-sample" action="{{ route('siswa.biodata-diri.updateperbaikan_data', [$item->nisn_biodata]) }}" method="POST">
              {{ method_field('PATCH') }}
              @csrf

              <div class="form-group">

                <div class="form-group">
                    <label>Nik</label>
                    <input type="text" value="{{ old('nik', $item->user->nik) }}" class="form-control @error('nik')is-invalid @enderror"
                    name="nik" >
                    @error('nik') 
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" value="{{ old('name', $item->user->name) }}" class="form-control @error('name')is-invalid @enderror"
                        name="name" >
                        @error('name') 
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                    </div>
               

              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenkel" id="" class="form-control">
                    <option value="{{ $item->jenkel }}">{{ $item->jenkel }}</option>
                    @if ($item->jenkel == 'L')
                        <option value="P">P</option>
                    @else
                         <option value="L">L</option>
                    @endif
                </select>

              </div>

              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" value="{{ old('tempat_lahir', $item->tempat_lahir) }}" class="form-control @error('tempat_lahir')is-invalid @enderror"
                                                        name="tempat_lahir" >
                                                        @error('tempat_lahir') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
              </div>

              <div class="form-group">
                <label>Tanggal lahir</label>
                <input type="date" value="{{ old('tgl_lahir', $item->tgl_lahir) }}" class="form-control"
                name="tgl_lahir" >
              </div>

              <div class="form-group">
                <label>Jumlah Saudara Kandung</label>
                <input type="number" value="{{ old('jml_sdr_kdg', $item->jml_sdr_kdg) }}" class="form-control @error('jml_sdr_kdg')is-invalid @enderror"
                name="jml_sdr_kdg" >
                @error('jml_sdr_kdg') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>

              <div class="form-group">
                <label>Anak Keberapa</label>
                <input type="number" value="{{ old('anak_keberapa', $item->anak_keberapa) }}" class="form-control @error('anak_keberapa')is-invalid @enderror"
                                                        name="anak_keberapa" >
                                                        @error('anak_keberapa') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
              </div>

              <div class="form-group">
                <label>Agama</label>
                <select class="form-control" name="agama_id" required>
                    @foreach ($agama as $agamas)
                        @if(old('agama_id', $item->agama_id) == $agamas->id )
                            <option value="{{ $agamas->id }}" selected>{{ $agamas->nama }}</option>      
                        @else
                            <option value="{{ $agamas->id }}">{{ $agamas->nama }}</option>    
                        @endif
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>No registrasi akta lahir</label>
                <input type="text" value="{{ old('no_akte', $item->no_akte) }}" class="form-control @error('no_akte')is-invalid @enderror"
                name="no_akte" >
                @error('no_akte') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
                <span class="text-danger" style="font-size:10px">Silahkan input no akte sesuai dengan data anda </span>
              </div>

              <div class="form-group">
                <label>Agama</label>
                <select name="status_kewarganegaraan" id="" class="form-control">
                    @if ($item->status_kewarganegaraan == 'WNI')
                        <option value="WNI" selected>WNI</option>
                        <option value="WNA">WNA</option>
                    @else
                         <option value="WNA" selected>WNA</option>
                         <option value="WNI">WNI</option>
                    @endif
                </select>
              </div>


              <div class="form-group">
                <label>Alamat</label>
                <input type="text" value="{!! old('alamat', $item->alamat) !!}" class="form-control @error('alamat')is-invalid @enderror"
                name="alamat" >
                @error('alamat') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label>Rt</label>
                  <input type="number" value="{{  old('rt', $item->rt)  }}" class="form-control @error('rt')is-invalid @enderror"
                    name="rt" >
                    @error('rt') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  <span class="text-danger" style="font-size: 10px">Boleh dikosongkan</span>
                </div>

                <div class="form-group col-6">
                  <label>Rw</label>
                  <input type="number" value="{{  old('rw', $item->rw)  }}" class="form-control @error('rw')is-invalid @enderror"
                  name="rw" >
                  @error('rw') 
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                  <span class="text-danger" style="font-size: 10px">Boleh dikosongkan</span>
                </div>
              </div>

              <div class="form-group">
                <label>Nama Dusun</label>
                <input type="text" value="{{  old('nama_dusun', $item->nama_dusun)  }}" class="form-control @error('nama_dusun')is-invalid @enderror"
                                                        name="nama_dusun" >
                                                        @error('nama_dusun') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
              </div>

              <div class="form-group">
                <label>Nama Kelurahan / Desa</label>
                <input type="text" value="{{  old('kelurahan_desa', $item->kelurahan_desa)  }}" class="form-control @error('kelurahan_desa')is-invalid @enderror"
                                                        name="kelurahan_desa" >
                                                        @error('kelurahan_desa') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
              </div>

              <div class="form-group">
                <label>Kecamatan</label>
                <input type="text" value="{{  old('kecamatan', $item->kecamatan)  }}" class="form-control @error('kecamatan')is-invalid @enderror"
                name="kecamatan" >
                @error('kecamatan') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>

              <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" value="{{  old('kode_pos', $item->kode_pos)  }}" class="form-control @error('kode_pos')is-invalid @enderror"
                                                        name="kode_pos" >
                                                        @error('kode_pos') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
              </div>     

              <div class="form-group">
                <label>Jenis tinggal</label>
                <select class="form-control" name="jenis_tinggal" required>
                    @foreach ($jenis_tinggal as $jenis_tinggals)
                        @if(old('jenis_tinggal', $item->jenis_tinggal) == $jenis_tinggals->id )
                            <option value="{{ $jenis_tinggals->id }}" selected>{{ $jenis_tinggals->nama }}</option>      
                        @else
                            <option value="{{ $jenis_tinggals->id }}">{{ $jenis_tinggals->nama }}</option>    
                        @endif
                    @endforeach
                </select>
              </div> 

              <div class="form-group">
                <label>Mode Tranportasi</label>
                <select class="form-control" name="mode_transportasi" required>
                    @foreach ($mode_trans as $mode_trans)
                        @if(old('mode_transportasi', $item->mode_transportasi) == $mode_trans->id )
                            <option value="{{ $mode_trans->id }}" selected>{{ $mode_trans->nama }}</option>      
                        @else
                            <option value="{{ $mode_trans->id }}">{{ $mode_trans->nama }}</option>    
                        @endif
                    @endforeach 
                </select>
              </div> 

              <div class="form-group">
                <label>Nomor Hp</label>
                <input type="text" value="{{  old('no_hp', $item->no_hp)  }}" class="form-control @error('no_hp')is-invalid @enderror"
                name="no_hp" > 
                @error('no_hp') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div> 

              <div class="form-group">
                <label>Kartu KKS</label>
                <select class="form-control" name="status_KKS" id="status_KKS" required>
                                                       
                    @if(old('status_KKS', $item->status_KKS) == 'true')
                        <option value="true" selected>Kartu Tersedia</option>    
                        <option value="false">Tidak Ada Kartu</option>    
                    @else
                        <option value="false" selected>Tidak Ada Kartu</option> 
                        <option value="true" >Kartu Tersedia</option>       
                    @endif
              
                </select>

                <label class="mt-2" id="label_kks" @php if($item->status_KKS == 'false') echo 'hidden' @endphp>Nomor KKS</label>
                <input type="text" id="nomor_kks" @php if($item->status_KKS == 'false') echo 'hidden' @endphp value="{{  old('nomor_kks', $item->nomor_kks)  }}" class="form-control mt-2" style="border-radius:30px"
                name="nomor_kks" > 
              </div> 

              <div class="form-group">
                <label>Kartu KPS/PKH</label>
                <select class="form-control" name="status_KPS_PKH" id="status_KPS_PKH" required>
                                                       
                    @if(old('status_KPS_PKH', $item->status_KPS_PKH) == 'true')
                        <option value="true" selected>Kartu Tersedia</option>    
                        <option value="false">Tidak Ada Kartu</option>    
                    @else
                        <option value="false" selected>Tidak Ada Kartu</option> 
                        <option value="true" >Kartu Tersedia</option>       
                    @endif
              
                </select>

                <label class="mt-2" id="label_KPS_PKH" @php if($item->status_KPS_PKH == 'false') echo 'hidden' @endphp>Nomor KPS/PKH</label>
                <input type="text" id="nomor_KPS_PKH" @php if($item->status_KPS_PKH == 'false') echo 'hidden' @endphp value="{{  old('nomor_KPS_PKH', $item->nomor_KPS_PKH)  }}" class="form-control @error('nik')is-invalid @enderror mt-2" style="border-radius:30px"
                name="nomor_KPS_PKH" > 
              </div> 

              <div class="form-group">
                <label>Kartu KPS/PKH</label>
                <select class="form-control @error('nik')is-invalid @enderror" name="status_kip" id="status_kip" required>
                                                       
                    @if(old('status_kip', $item->status_kip) == 'true')
                        <option value="true" selected>Kartu Tersedia</option>    
                        <option value="false">Tidak Ada Kartu</option>    
                    @else
                        <option value="false" selected>Tidak Ada Kartu</option> 
                        <option value="true" >Kartu Tersedia</option>       
                    @endif
              
            </select>

            <label class="mt-2" id="label_kip" @php if($item->status_kip == 'false') echo 'hidden' @endphp>Nomor KIP</label>
            <input type="text" id="nomor_kip" @php if($item->status_kip == 'false') echo 'hidden' @endphp value="{{  old('nomor_kip', $item->nomor_kip)  }}" class="form-control @error('nik')is-invalid @enderror mt-2"  style="border-radius:30px"
            name="nomor_kip" > 

            <label class="mt-2" id="label_nama_kip" @php if($item->status_kip == 'false') echo 'hidden' @endphp>Nama KIP</label>
            <input type="text" id="nama_kip" @php if($item->status_kip == 'false') echo 'hidden' @endphp value="{{  old('nama_kip', $item->nama_kip)  }}" class="form-control @error('nik')is-invalid @enderror mt-2" style="border-radius:30px"
            name="nama_kip" > 
              </div> 

             

              <div class="form-group row">
                <div class="col-8">
                    <label>Berat Badan</label>
                    <input type="number"  value="{{  old('berat_badan', $item->berat_badan)  }}" class="form-control @error('berat_badan')is-invalid @enderror"
                    name="berat_badan" > 
                    @error('berat_badan') 
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> 
                <div class="col-2">
                    <br> <br>
                    <p style="font-size: 16px">Kg </p>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-8">
                    <label>tinggi badan</label>
                            <input type="number" value="{{  old('tinggi_badan', $item->tinggi_badan)  }}" class="form-control @error('tinggi_badan')is-invalid @enderror"
                            name="tinggi_badan" >
                            @error('tinggi_badan') 
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                             @enderror
                    </div>
                    <div class="col-2">
                        <br> <br>
                        <p style="font-size: 16px">Cm </p>
                    </div>
              </div>

              <div class="form-group row">
                <div class="col-8">
                  <label>Jarak rumah kesekolah</label>
                  <input type="number" value="{{  old('jarak_rumah_sekolah', $item->jarak_rumah_sekolah)  }}" class="form-control @error('jarak_rumah_sekolah')is-invalid @enderror"
                                                        name="jarak_rumah_sekolah" >
                                                        @error('jarak_rumah_sekolah') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
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
                  <input type="number" value="{{  old('waktu_tempuh', $item->waktu_tempuh)  }}" class="form-control @error('waktu_tempuh')is-invalid @enderror"
                  name="waktu_tempuh" >
                  @error('waktu_tempuh') 
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                </div>
                <div class="col-2">
                  <br> <br>
                  <p style="font-size: 16px">Menit </p>
                </div>
              </div>
          
                <button type="submit" class="btn btn-primary mr-2" style="border-radius: 30px;" onclick="return confirm('Apakah data anda sudah benar ? ')" >Kirim</button>
                <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
              </form>
                
            </div>
          </div>
        </div>
      </div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Catatan Kesalahan Biodata Diri</h5>
          <button type="button" class="close" data-bs-dismiss="modal"
              aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">
          <p>
            {!! $item->catatan_biodata  !!}
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="petunjuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Petunjuk Pembaruan Data</h5>
          <button type="button" class="close" data-bs-dismiss="modal"
              aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Data anda sekarang ada <span class="text-danger">kesalahan</span>, silahkan perbaiki data yang terdapat kesalahan,
            form perbaikan data hanya bisa dilakukan sekali, silahkan perbarui data anda dengan benar,
            data anda berpengaruh pada masa depan anda.....
        </p>
        <span class="text-primary"> Silahkan mengahadap verifikator, jika mengalami kesulitan </span>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

@endsection

@push('addon-script')

<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
$(window).load(function(){
$("#status_KKS").change(function() {
			console.log($("#status_KKS option:selected").val());
			if ($("#status_KKS option:selected").val() == 'false') {
				$('#nomor_kks').prop('hidden', 'true');
                $('#label_kks').prop('hidden', 'true');
			} else {
				$('#nomor_kks').prop('hidden', false);
                $('#label_kks').prop('hidden', false);
			}
		});

        $("#status_KPS_PKH").change(function() {
			console.log($("#status_KPS_PKH option:selected").val());
			if ($("#status_KPS_PKH option:selected").val() == 'false') {
				$('#nomor_KPS_PKH').prop('hidden', 'true');
                $('#label_KPS_PKH').prop('hidden', 'true');
			} else {
				$('#nomor_KPS_PKH').prop('hidden', false);
                $('#label_KPS_PKH').prop('hidden', false);
			}
		});

        $("#status_kip").change(function() {
			console.log($("#status_kip option:selected").val());
			if ($("#status_kip option:selected").val() == 'false') {
				$('#nomor_kip').prop('hidden', 'true');
                $('#nama_kip').prop('hidden', 'true');
                $('#label_kip').prop('hidden', 'true');
                $('#label_nama_kip').prop('hidden', 'true');
			} else {
				$('#nomor_kip').prop('hidden', false);
                $('#nama_kip').prop('hidden', false);
                $('#label_kip').prop('hidden', false);
                $('#label_nama_kip').prop('hidden', false);
			}
		});
});
</script>
