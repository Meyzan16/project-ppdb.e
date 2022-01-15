
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Edit Data Orang Tua</h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nama : {{ $query->user->name }}</h4>
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
                            <form class="form form-horizontal mdi-responsive" action="{{ route('admin.data-ortu.update', $query->nisn_ortu) }}" method="POST" >
                                @csrf @method('PATCH')
                                <div class="form-body">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label>Nik Ayah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nik_ayah', $query->nik_ayah) }}" class="form-control @error('nik_ayah')is-invalid @enderror"
                                                        name="nik_ayah">
                                                        @error('nik_ayah') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                        
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Nama Ayah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nama_ayah', $query->nama_ayah) }}" class="form-control @error('nama_ayah')is-invalid @enderror"
                                                        name="nama_ayah" >
                                                        @error('nama_ayah') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Tanggal Lahir Ayah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="date" name="tgl_ayah" value="{{ old('tgl_ayah', $query->tgl_ayah) }}" class="form-control">
                                                      
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Pendidikan Ayah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>Pekerjaan Ayah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>Penghasilan Bulanan Ayah</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>Nik ibu</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nik_ibu', $query->nik_ibu) }}" class="form-control @error('nik_ibu')is-invalid @enderror"
                                                        name="nik_ibu">
                                                        @error('nik_ibu') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Nama ibu</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nama_ibu', $query->nama_ibu) }}" class="form-control @error('nama_ibu')is-invalid @enderror"
                                                        name="nama_ibu" >
                                                        @error('nama_ibu') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Tanggal Lahir ibu</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="date"  name="tgl_ibu" value="{{ old('tgl_ibu', $query->tgl_ibu) }}" class="form-control">
                                                      
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Pendidikan ibu</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>Pekerjaan ibu</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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

                                                <div class="col-md-4">
                                                    <label>Penghasilan Bulanan ibu</label>
                                                </div>
                                                <div class="col-md-8 form-group">
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



                                                
                                            
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"  class="btn btn-primary me-1 mb-1"
                                                     onclick="return confirm('Yakin, ingin perbarui data ?')">
                                                    &nbsp;Simpan
                                                    </button>
                                                  

                                                    <button type="reset" onclick="location.href='{{ route('admin.data-ortu.show', $query->nisn_ortu) }}'"
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







