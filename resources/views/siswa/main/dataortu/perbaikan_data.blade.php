@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Perbaikan Data Orang Tua {{ $query->user->name }}</h3>
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
        <button type="button" class="mb-2 btn btn-outline-primary block" data-toggle="modal" data-target="#exampleModalOrtu">
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
              <h4 class="card-title">Form Perbaikan Data Orang Tua</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
            <form class="forms-sample" action="{{ route('siswa.data-ortu.updateperbaikan_data', [$query->nisn_ortu]) }}" method="POST">
              {{ method_field('PATCH') }}
              @csrf

              <div class="form-group">

                <div class="form-group">
                    <label>Nik Ayah</label>
                    <input type="text" value="{{ old('nik_ayah', $query->nik_ayah) }}" class="form-control @error('nik_ayah')is-invalid @enderror"
                    name="nik_ayah">
                    @error('nik_ayah') 
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" value="{{ old('nama_ayah', $query->nama_ayah) }}" class="form-control @error('nama_ayah')is-invalid @enderror"
                        name="nama_ayah" >
                        @error('nama_ayah') 
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
               
              <div class="form-group">
                <label>Tanggal lahir Ayah</label>
                <input type="date" name="tgl_ayah" value="{{ old('tgl_ayah', $query->tgl_ayah) }}" class="form-control">
              </div>

        

              <div class="form-group">
                <label>Pendidikan Ayah</label>
                <select class="form-control" name="pendidikan_ayah" required>
                    @foreach ($pendidikan as $pendidikans)
                        @if(old('pendidikan_ayah', $query->pendidikan_ayah) == $pendidikans->id )
                            <option value="{{ $pendidikans->id }}" selected>{{ $pendidikans->nama }}</option>      
                        @else
                            <option value="{{ $pendidikans->id }}">{{ $pendidikans->nama }}</option>    
                        @endif
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Pekerjaan Ayah</label>
                <select class="form-control" name="pekerjaan_ayah" required>
                    @foreach ($pekerjaan as $pekerjaans)
                        @if(old('pekerjaan_ayah', $query->pekerjaan_ayah) == $pekerjaans->id )
                            <option value="{{ $pekerjaans->id }}" selected>{{ $pekerjaans->nama }}</option>      
                        @else
                            <option value="{{ $pekerjaans->id }}">{{ $pekerjaans->nama }}</option>    
                        @endif
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Penghasilan Bulanan Ayah</label>
                 <select class="form-control" name="penghasilan_bulanan_ayah" required>
                                                    @foreach ($penghasilan as $penghasilans)
                                                        @if(old('penghasilan_bulanan_ayah', $query->penghasilan_bulanan_ayah) == $penghasilans->id )
                                                            <option value="{{ $penghasilans->id }}" selected>{{ $penghasilans->nama }}</option>      
                                                        @else
                                                            <option value="{{ $penghasilans->id }}">{{ $penghasilans->nama }}</option>    
                                                        @endif
                                                    @endforeach
                                                </select>
              </div>

              <hr class="mt-2">

              <div class="form-group">
                <label>Nik Ibu</label>
                <input type="text" value="{{ old('nik_ibu', $query->nik_ibu) }}" class="form-control @error('nik_ibu')is-invalid @enderror"
                name="nik_ibu">
                @error('nik_ibu') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

                <div class="form-group">
                    <label>Nama Ibu</label>
                    <input type="text" value="{{ old('nama_ibu', $query->nama_ibu) }}" class="form-control @error('nama_ibu')is-invalid @enderror"
                    name="nama_ibu" >
                    @error('nama_ibu') 
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
           
          <div class="form-group">
            <label>Tanggal lahir Ibu</label>
            <input type="date"  name="tgl_ibu" value="{{ old('tgl_ibu', $query->tgl_ibu) }}" class="form-control">
          </div>

    

          <div class="form-group">
            <label>Pendidikan Ibu</label>
            <select class="form-control" name="pendidikan_ibu" required>
                @foreach ($pendidikan as $pendidikans)
                    @if(old('pendidikan_ibu', $query->pendidikan_ibu) == $pendidikans->id )
                        <option value="{{ $pendidikans->id }}" selected>{{ $pendidikans->nama }}</option>      
                    @else
                        <option value="{{ $pendidikans->id }}">{{ $pendidikans->nama }}</option>    
                    @endif
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Pekerjaan Ibu</label>
            <select class="form-control" name="pekerjaan_ibu" required>
                @foreach ($pekerjaan as $pekerjaans)
                    @if(old('pekerjaan_ibu', $query->pekerjaan_ibu) == $pekerjaans->id )
                        <option value="{{ $pekerjaans->id }}" selected>{{ $pekerjaans->nama }}</option>      
                    @else
                        <option value="{{ $pekerjaans->id }}">{{ $pekerjaans->nama }}</option>    
                    @endif
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Penghasilan Bulanan Ibu</label>
            <select class="form-control" name="penghasilan_bulanan_ibu" required>
                @foreach ($penghasilan as $penghasilans)
                    @if(old('penghasilan_bulanan_ibu', $query->penghasilan_bulanan_ibu) == $penghasilans->id )
                        <option value="{{ $penghasilans->id }}" selected>{{ $penghasilans->nama }}</option>      
                    @else
                        <option value="{{ $penghasilans->id }}">{{ $penghasilans->nama }}</option>    
                    @endif
                @endforeach
            </select>
          </div>
    
                <button type="submit" class="btn btn-primary mr-2" style="border-radius: 30px;" onclick="return confirm('Apakah data anda sudah benar ? ')" >Kirim</button>
                <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
              </form>
                
            </div>
          </div>
        </div>
      </div>
</div>


<div class="modal fade" id="exampleModalOrtu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Catatan Kesalahan Data Ortu</h5>
          <button type="button" class="close" data-bs-dismiss="modal"
              aria-label="Close">
              <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">
          <p>
            {!! $query->catatan_ortu  !!}
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

