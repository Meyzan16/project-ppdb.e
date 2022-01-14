
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Detail Data Orang Tua</h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-10 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Nama : {{ $query->user->name }}</h4>
                        <h4 class="card-title">Status Data Orang Tua : {{ $query->status_ortu }}</h4>
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
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <button type="button" class="mb-2 btn btn-danger" aria-label="Left Align" onclick="location.href='{{ route('admin.biodata-diri.index') }}'">
                                                <i class="fa fa-arrow-circle-left"> </i> Kembali
                                            </button>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <div class="row">
                                                   

                                                        <legend></legend>
                                                        <div class="col-lg-12 col-md-12">
                                                            <table class='table table-striped'>	
                                                                
                                                                <tr>
                                                                    <th scope='row'>NIK Ayah</th>
                                                                    <td>{{ $query->nik_ayah }}</td>
                                                                </tr>		
                                                                <tr>
                                                                    <th scope='row'>Nama Ayah</th>
                                                                    <td>{{ $query->nama_ayah }}</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th scope='row'>Tanggal Lahir Ayah</th>
                                                                    <td>{{ $query->tgl_ayah }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Pendidikan Ayah</th>
                                                                    <td>{{ $query->pendidikan_a->nama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Pekerjaan Ayah</th>
                                                                    <td>{{ $query->pekerjaan_a->nama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Penghasilan Bulanan Ayah</th>
                                                                    <td>{{ $query->penghasilan_bulanan_a->nama }}</td>
                                                                </tr>
                                                                
                                                            </table>

                                                            <br>

                                                            <table class='table table-striped'>	
                                                                
                                                                <tr>
                                                                    <th scope='row'>NIK Ayah</th>
                                                                    <td>{{ $query->nik_ibu}}</td>
                                                                </tr>		
                                                                <tr>
                                                                    <th scope='row'>Nama Ayah</th>
                                                                    <td>{{ $query->nama_ibu}}</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th scope='row'>Tanggal Lahir Ayah</th>
                                                                    <td>{{ $query->tgl_ibu}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Pendidikan Ayah</th>
                                                                    <td>{{ $query->pendidikan_i->nama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Pekerjaan Ayah</th>
                                                                    <td>{{ $query->pekerjaan_i->nama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Penghasilan Bulanan Ayah</th>
                                                                    <td>{{ $query->penghasilan_bulanan_i->nama }}</td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </div>

                                                    </div>

                                                        <button type="button" class="mb-2 btn btn-outline-success block"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                            &nbsp;Konfirmasi
                                                            </button>

                                                </div>
                                            </div>
                                            <!-- /.panel-body -->
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
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi Data {{ $query->name }}
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

            <form action="{{ route('admin.biodata-diri.verifikasi', [$query->nisn_ortu]) }}" method="POST">
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

