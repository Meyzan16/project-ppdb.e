
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
                            <form class="form form-horizontal mdi-responsive">
                                <div class="form-body">
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <label>nisn</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nisn', $post->nisn) }}" class="form-control"
                                                        name="nisn" readonly>
                                                        
                                                </div>

                                                <div class="col-md-4">
                                                    <label>nama</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('name', $post->name) }}" class="form-control"
                                                        name="name" >
                                                </div>

                                                <div class="col-md-4">
                                                    <label>nik</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('nik', $post->nik) }}" class="form-control @error('nik')is-invalid @enderror"
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
                                                    <input type="email" value="{{ old('email', $post->email) }}" class="form-control @error('email')is-invalid @enderror"
                                                        name="email" >
                                                </div>

                                                <div class="col-md-4">
                                                    <label>username</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('username', $post->username) }}" class="form-control @error('username')is-invalid @enderror"
                                                        name="username" >
                                                        @error('username') 
                                                        <div class="invalid-feedback">
                                                          {{ $message }}
                                                        </div>
                                                      @enderror
                                                </div>

                                                <div class="col-md-4">
                                                    <label>tahun daftar</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('tahun_daftar', $post->tahun_daftar) }}" class="form-control @error('tahun_daftar')is-invalid @enderror"
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
                                                    <select name="jenkel" id="" class="form-control ">
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
                                                    <input type="date" value="{{ old('tgl_lahir', $post->tgl_lahir) }}" class="form-control"
                                                        name="tgl_lahir" >
                                                </div>

                                                <div class="col-md-4">
                                                    <label>tempat lahir</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" value="{{ old('tempat_lahir', $post->tempat_lahir) }}" class="form-control"
                                                        name="tempat_lahir" >
                                                </div>

                                                


                                                
                                            
                                            
                                            
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" onclick="location.href='{{ route('admin.biodata-diri.index') }}'"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
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



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi Data {{ $item->name }}
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <p>
                Perhatian !!!
                Data yang sudah di validasi tidak bisa di perbarui, atau pun diedit dimohon untuk
                diteliti kembali data siswa tersebut, kesalahan data bisa 
                mengakibat kan masalah-masalah berikutnya.....
                <span class="badge bg-primary" >Untuk validasi data kembali, silahkan hubungi Administrator</span>
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary"
                data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Kembali</span>
            </button>

            <form action="{{ route('admin.biodata-diri.verifikasi', [$item->nisn]) }}" method="POST">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Verifikasi</span>
                </button>
            </form>
            
        </div>
    </div>
</div>
</div>

    
@endsection



