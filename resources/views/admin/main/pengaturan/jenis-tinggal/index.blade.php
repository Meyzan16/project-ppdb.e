
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Jenis Tinggal</h3>
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
        @if(session()->has('error'))
        <div class="autohide">
            <div class="alert alert-danger autohide" role="alert">
             {{ session('error') }}
            </div>    
        </div>
        @endif
    </div>

    <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header text-right">

                        <button type="button" class="mr-3 btn btn-outline-primary block"
                        data-bs-toggle="modal" data-bs-target="#catatan_penolakan">
                        &nbsp;Tambah Data
                        </button>

                        <a href="{{ route('admin.data-jenis-tinggal.trash') }}" class='sidebar-link'>
                            <i class="fas fa-trash-alt"></i>
                            <span>Tempat Sampah</span>
                        </a>

                    </div>


                    

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Diperbarui</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->created_at }}</td>   
                                    <td>{{ $item->updated_at }}</td> 

                                    <td>
                                            {{-- aturan default resource tambahakan edit di belakang --}}
                                           

                                        <a class="badge bg-warning"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $item->id }}">  <i class="fa fa-edit"> </i>  </a>

                                        <form action="{{ route('data-jenis-tinggal.destroy', $item->id) }}" method="POST" class="d-inline">
                                            {{ csrf_field() }}  {{ method_field("DELETE") }}
                                            <button class="badge bg-danger border-0" onclick="return confirm('Data akan dihapus secara sementara')" >  <i class="fa fa-trash"> </i>
                                            </button>
                                        </form>
                                    </td>
                                    

                                
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </div>
        
    <div class="modal fade" id="catatan_penolakan" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle"> Tambah Data
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('data-jenis-tinggal.store') }}" method="POST">
                @csrf 
                <div class="modal-body">
                    <h6 class="modal-title" id="exampleModalCenterTitle"> Nama  </h6>
                   <input type="text" class="form-control" name="nama">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
    
                      
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    
                </div>
            </form>
        </div>
    </div>
    </div>

    @foreach ($data as $item1)
    <div class="modal fade" id="edit_data{{ $item1->id  }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"> Edit Data
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('data-jenis-tinggal.update', $item1->id) }}" method="POST">
                    @csrf  @method('put')
                    <div class="modal-body">
                        <h6 class="modal-title" id="exampleModalCenterTitle"> Nama  </h6>
                        <input type="text" value="{{  old('nama', $item1->nama)  }}" class="form-control" name="nama">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>
        
                        
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    @endforeach

@endsection

