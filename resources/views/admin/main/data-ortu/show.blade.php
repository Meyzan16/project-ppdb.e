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

                       

                        @if ($query->catatan_ortu != '' && $query->status_ortu == 'N')
                        <button type="button" class="mb-2 btn btn-outline-danger block"
                        data-bs-toggle="modal" data-bs-target="#catatan_penolakan">
                        &nbsp;Catatan Penolakan
                        </button>
                    @endif

                       
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

                    <div class="div">
                        @if(session()->has('success_tolak'))
                        <div class="autohide">
                            <div class="alert alert-danger autohide" role="alert">
                             {{ session('success_tolak') }}
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
                                            <button type="button" class="mb-1 btn btn-danger" aria-label="Left Align" onclick="location.href='{{ route('admin.biodata-diri.index') }}'">
                                                <i class="fa fa-arrow-circle-left"> </i> Kembali
                                            </button>

                                       
                                            @if ($query->status_ortu == 'N')
                                                <button type="button" class="mb-1 btn btn-warning" aria-label="Left Align" onclick="location.href='{{ route('admin.data-ortu.edit', $query->nisn_ortu) }}'">
                                                    <i class="fa fa-edit"> </i> Edit
                                                </button>       
                                            @elseif($query->status_ortu == 'belum diverifikasi')   
                                                <button type="button" class="mb-1 btn btn-warning" aria-label="Left Align" onclick="location.href='{{ route('admin.data-ortu.edit', $query->nisn_ortu) }}'">
                                                    <i class="fa fa-edit"> </i> Edit
                                                </button>                         
                                            @endif

                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <div class="row">
                                                   

                                                        <legend></legend>
                                                        <div class="col-lg-12 col-md-12">
                                                            <table class='table table-striped'>	
                                                                
                                                                @if ($query->status_ortu == 'N') 
                                                                    <tr>
                                                                        <th scope='row'>Status Verifikasi</th>
                                                                        <td><span class="badge bg-danger">Verifikasi ditolak</span>
                                                                        </td>
                                                                    </tr>
                                                                @elseif($query->status_ortu == 'Y')
                                                                    <tr>
                                                                        <th scope='row'>Status Verifikasi</th>
                                                                        <td>
                                                                            <span class="badge bg-success">Verifikasi diterima</span>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Status Verifikasi</th>
                                                                        <td>
                                                                            <span class="badge bg-primary">Belum Diverifikasi</span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

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
                                                                    <th scope='row'>NIK Ibu</th>
                                                                    <td>{{ $query->nik_ibu}}</td>
                                                                </tr>		
                                                                <tr>
                                                                    <th scope='row'>Nama Ibu</th>
                                                                    <td>{{ $query->nama_ibu}}</td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <th scope='row'>Tanggal Lahir Ibu</th>
                                                                    <td>{{ $query->tgl_ibu}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Pendidikan Ibu</th>
                                                                    <td>{{ $query->pendidikan_i->nama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Pekerjaan Ibu</th>
                                                                    <td>{{ $query->pekerjaan_i->nama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Penghasilan Bulanan Ibu</th>
                                                                    <td>{{ $query->penghasilan_bulanan_i->nama }}</td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </div>

                                                    </div>

                                                    @if ($query->status_ortu == 'N')
                                                            <button type="button" class="mb-2 btn btn-outline-success block"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                            &nbsp;Diterima
                                                            </button>

                                                            <button type="button" class="mb-2 btn btn-outline-danger block"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalTolak">
                                                            &nbsp;Ditolak
                                                            </button>   
                                                    @elseif($query->status_ortu == 'belum diverifikasi')   
                                                            <button type="button" class="mb-2 btn btn-outline-success block"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                            &nbsp;Diterima
                                                            </button>

                                                            <button type="button" class="mb-2 btn btn-outline-danger block"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModalTolak">
                                                            &nbsp;Ditolak
                                                            </button>                       
                                                    @endif
                                                            

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
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi Diterima {{ $query->user->name }}
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

            <form action="{{ route('admin.data-ortu.verifikasi', [$query->nisn_ortu]) }}" method="POST">
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


<div class="modal fade" id="exampleModalTolak" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Validasi Ditolak {{ $query->user->name }}
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form action="{{ route('admin.data-ortu.verifikasi_tolak', [$query->nisn_ortu]) }}" method="POST">
            @csrf {{ method_field('PATCH') }}
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalCenterTitle"> Catatan </h5>
                <textarea name="catatan_ortu" cols="52" rows="5"> </textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Kembali</span>
                </button>

                  
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Verifikasi</span>
                    </button>
                
            </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="catatan_penolakan" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"> Catatan Penolakan {{ $query->user->name }}
            </h5>
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
            <button type="button" class="btn btn-light-secondary"
                data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Kembali</span>
            </button>
        </div>
    </div>
</div>
</div>

    
@endsection

