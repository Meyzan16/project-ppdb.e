
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Edit Data {{ $item->name }}</h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Biodata Diri</h4>
                    </div>

                    <div class="div">
                        @if(session()->has('success'))
                        <div class="autohide">
                            <div class="alert alert-success autohide" role="alert">
                             {{ session('success') }}
                            </div>    
                        </div>
                        @endif
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal mdi-responsive" action="{{ route('admin.biodata-diri.update', $item->nisn) }}" method="POST" >
                                @csrf @method('PATCH')
                                <div class="form-body">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label>nisn</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nisn', $item->nisn) }}" class="form-control"
                                                        name="nisn" readonly>
                                                        
                                                </div>

                                                <div class="col-md-4">
                                                    <label>nama</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('name', $item->name) }}" class="form-control @error('name')is-invalid @enderror"
                                                        name="name" >
                                                        @error('name') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>nik</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nik', $item->nik) }}" class="form-control @error('nik')is-invalid @enderror"
                                                        name="nik" >
                                                        @error('nik') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>email</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="email" value="{{ old('email', $item->email) }}" class="form-control @error('email')is-invalid @enderror"
                                                        name="email" >
                                                        @error('email') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>username</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('username', $item->username) }}" class="form-control @error('username')is-invalid @enderror"
                                                        name="username" >
                                                        @error('username') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>tahun masuk</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('tahun_daftar', $item->tahun_daftar) }}" class="form-control @error('tahun_daftar')is-invalid @enderror"
                                                        name="tahun_daftar" >
                                                        @error('tahun_daftar') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Jenis Kelamin</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select name="jenkel" id="" class="form-control">
                                                        <option value="{{ $item->jenkel }}">{{ $item->jenkel }}</option>
                                                        @if ($item->jenkel == 'L')
                                                            <option value="P">P</option>
                                                        @else
                                                             <option value="L">L</option>
                                                        @endif
                                                    </select>
                                                </div>
  
                                                <div class="col-md-4">
                                                    <label>tanggal lahir</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="date" value="{{ old('tgl_lahir', $item->tgl_lahir) }}" class="form-control"
                                                        name="tgl_lahir" >
                                                        
                                                </div>

                                                <div class="col-md-4">
                                                    <label>tempat lahir</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('tempat_lahir', $item->tempat_lahir) }}" class="form-control @error('tempat_lahir')is-invalid @enderror"
                                                        name="tempat_lahir" >
                                                        @error('tempat_lahir') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Agama</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>Anak Keberapa</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" value="{{ old('anak_keberapa', $item->anak_keberapa) }}" class="form-control @error('anak_keberapa')is-invalid @enderror"
                                                        name="anak_keberapa" >
                                                        @error('anak_keberapa') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Jumlah Saudara Kandung</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" value="{{ old('jml_sdr_kdg', $item->jml_sdr_kdg) }}" class="form-control @error('jml_sdr_kdg')is-invalid @enderror"
                                                        name="jml_sdr_kdg" >
                                                        @error('jml_sdr_kdg') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                               
                                                <div class="col-md-4">
                                                    <label>No Akte</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('no_akte', $item->no_akte) }}" class="form-control @error('no_akte')is-invalid @enderror"
                                                        name="no_akte" >
                                                        @error('no_akte') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kewarganegaraan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>Alamat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{!! old('alamat', $item->alamat) !!}" class="form-control @error('alamat')is-invalid @enderror"
                                                        name="alamat" >
                                                        @error('alamat') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>RT</label>
                                                </div>                                              
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" value="{{  old('rt', $item->rt)  }}" class="form-control @error('rt')is-invalid @enderror"
                                                            name="rt" >
                                                            @error('rt') 
                                                            <div class="invalid-feedback">
                                                              {{ $message }}
                                                            </div>
                                                          @enderror
                                                    </div>
                                                
                                               

                                                <div class="col-md-4">
                                                    <label>RW</label>
                                                </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="number" value="{{  old('rw', $item->rw)  }}" class="form-control @error('rw')is-invalid @enderror"
                                                            name="rw" >
                                                            @error('rw') 
                                                            <div class="invalid-feedback">
                                                              {{ $message }}
                                                            </div>
                                                          @enderror
                                                    </div>

                                                <div class="col-md-4">
                                                    <label>Nama Dusun</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{  old('nama_dusun', $item->nama_dusun)  }}" class="form-control @error('nama_dusun')is-invalid @enderror"
                                                        name="nama_dusun" >
                                                        @error('nama_dusun') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kelurahan/Desa</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{  old('kelurahan_desa', $item->kelurahan_desa)  }}" class="form-control @error('kelurahan_desa')is-invalid @enderror"
                                                        name="kelurahan_desa" >
                                                        @error('kelurahan_desa') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kecamatan</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{  old('kecamatan', $item->kecamatan)  }}" class="form-control @error('kecamatan')is-invalid @enderror"
                                                        name="kecamatan" >
                                                        @error('kecamatan') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>  

                                                <div class="col-md-4">
                                                    <label>Kode Pos</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{  old('kode_pos', $item->kode_pos)  }}" class="form-control @error('kode_pos')is-invalid @enderror"
                                                        name="kode_pos" >
                                                        @error('kode_pos') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                                                               

                                                <div class="col-md-4">
                                                    <label>Jenis Tinggal</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>Mode Transportasi</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>No HP</label>
                                                </div>
                                                
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{  old('no_hp', $item->no_hp)  }}" class="form-control @error('no_hp')is-invalid @enderror"
                                                        name="no_hp" > 
                                                        @error('no_hp') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div> 

                                                <div class="col-md-4">
                                                    <label>Kartu KKS</label>
                                                </div>
                                                <div class="col-md-8 form-group kks">
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
                                                    <input type="text" id="nomor_kks" @php if($item->status_KKS == 'false') echo 'hidden' @endphp value="{{  old('nomor_kks', $item->nomor_kks)  }}" class="form-control mt-2"
                                                    name="nomor_kks" > 
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Kartu KPS/PKH</label>
                                                </div>
                                                <div class="col-md-8 form-group kks">
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
                                                    <input type="text" id="nomor_KPS_PKH" @php if($item->status_KPS_PKH == 'false') echo 'hidden' @endphp value="{{  old('nomor_KPS_PKH', $item->nomor_KPS_PKH)  }}" class="form-control @error('nik')is-invalid @enderror mt-2"
                                                    name="nomor_KPS_PKH" > 
                                                </div>

                                                 <div class="col-md-4">
                                                    <label>Kartu KIP</label>
                                                </div>
                                                <div class="col-md-8 form-group kks">
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
                                                    <input type="text" id="nomor_kip" @php if($item->status_kip == 'false') echo 'hidden' @endphp value="{{  old('nomor_kip', $item->nomor_kip)  }}" class="form-control @error('nik')is-invalid @enderror mt-2"
                                                    name="nomor_kip" > 

                                                    <label class="mt-2" id="label_nama_kip" @php if($item->status_kip == 'false') echo 'hidden' @endphp>Nama KIP</label>
                                                    <input type="text" id="nama_kip" @php if($item->status_kip == 'false') echo 'hidden' @endphp value="{{  old('nama_kip', $item->nama_kip)  }}" class="form-control @error('nik')is-invalid @enderror mt-2"
                                                    name="nama_kip" > 
                                                </div> 


                                                <div class="col-md-4">
                                                    <label>Berat Badan (KG) </label>
                                                </div>
                                                
                                                <div class="col-md-8 form-group">
                                                    <input type="number"  value="{{  old('berat_badan', $item->berat_badan)  }}" class="form-control @error('berat_badan')is-invalid @enderror"
                                                        name="berat_badan" > 
                                                        @error('berat_badan') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div> 
                                            

                                                <div class="col-md-4">
                                                    <label>Tinggi Badan (CM)</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" value="{{  old('tinggi_badan', $item->tinggi_badan)  }}" class="form-control @error('tinggi_badan')is-invalid @enderror"
                                                        name="tinggi_badan" >
                                                        @error('tinggi_badan') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div> 

                                                <div class="col-md-4">
                                                    <label>Jarak Rumah Sekolah (Meter)</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" value="{{  old('jarak_rumah_sekolah', $item->jarak_rumah_sekolah)  }}" class="form-control @error('jarak_rumah_sekolah')is-invalid @enderror"
                                                        name="jarak_rumah_sekolah" >
                                                        @error('jarak_rumah_sekolah') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div> 

                                                <div class="col-md-4">
                                                    <label>Waktu Tempuh (Meter)</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="number" value="{{  old('waktu_tempuh', $item->waktu_tempuh)  }}" class="form-control @error('waktu_tempuh')is-invalid @enderror"
                                                        name="waktu_tempuh" >
                                                        @error('waktu_tempuh') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div> 
                                                         
                                            
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"  class="btn btn-primary me-1 mb-1"
                                                     onclick="return confirm('Yakin, ingin perbarui data ?')">
                                                    &nbsp;Simpan
                                                    </button>
                                                  

                                                    <button type="reset" onclick="location.href='{{ route('admin.biodata-diri.index') }}'"
                                                        class="btn btn-light-secondary me-1 mb-1">Kembali</button>
                                                </div>
                                        </div>

                                </div>
                            </form>

                           

                        </div>
                    </div>
                </div>
            </div>
        </section>
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

@endpush




