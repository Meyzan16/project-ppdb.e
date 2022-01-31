
@extends('admin.layout_admin.layout')

@section('content')

<div id="main-content">
    <div class="page-heading">
        <h3>Generate Akun Verifikator</h3>
    </div>

<div class="page-content">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Generate Akun Verifikator </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            @if(session()->has('error'))
                            <div class="autohide">
                                <div class="alert alert-danger autohide" role="alert">
                                 {{ session('error') }}
                                </div>    
                            </div>
                            @endif

                            @if(session()->has('success'))
                            <div class="autohide">
                                <div class="alert alert-success autohide" role="alert">
                                 {{ session('success') }}
                                </div>    
                            </div>
                            @endif


                            <form class="form" action="{{ route('generate-akun-verifikator.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama</label>
                                            <input type="text" required  value="{{ old('nama') }}" class="form-control @error('nama')is-invalid @enderror"
                                                placeholder="nama" name="nama">
                                                @error('nama') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username</label>
                                            <input type="text" required  value="{{ old('username') }}" class="form-control @error('username')is-invalid @enderror"
                                                placeholder="username" name="username">
                                                @error('username') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Password </label>
                                            <input type="text" required class="form-control @error('password')is-invalid @enderror"  value="{{ old('password') }}"
                                                placeholder="Password" name="password">
                                                @error('password') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
                                    </div>    
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Role Akses </label>
                                            <select name="role" class="form-control">
                                                <option value="">--pilih data--</option>
                                                <option value="VERIFIKATOR"> VERIFIKATOR </option>
                                                <option value="ADMIN"> ADMIN </option>
                                            </select>
                                        </div>
                                    </div>  
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                            {{-- <a href="{{  }}"  class="btn btn-warning me-1 mb-1" > cancel </a> --}}
                                        
                                    </div>
                                </div>
                            </form>

                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Status Aktif</th> 
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->nama }}</td>   
                                        <td>{{ $item->role }}</td> 
    
                                        @if ($item->status_aktif == 'N') 
                                            <td>
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            </td>
                                        @else
                                            <td>
                                                <span class="badge bg-success">Aktif</span>
                                            </td>
                                        @endif

                                        <td>{{ $item->created_at}}</td> 
                                        <td>{{ $item->updated_at}}</td> 
    
                                      
                                        <td>    
                                            <a class="badge bg-warning"   data-bs-toggle="modal" data-bs-target="#edit_data{{ $item->id }}">  <i class="fa fa-edit"> </i>  </a>
    
    
                                  
                                            <form action="" method="POST" class="d-inline">
                                                {{ csrf_field() }}  {{ method_field("DELETE") }}
                                                <button class="badge bg-danger border-0" onclick="return confirm('Data akan dihapus secara sementara, data bisa dikembalikan kembali oleh admin')" >  <i class="fa fa-trash"> </i>
                                                </button>
                                            </form>
                                        </td>
                                        
    
                                    
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
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
            <form action="{{ route('generate-akun-verifikator.update', $item1->id) }}" method="POST">
                @csrf  @method('put')
                <div class="modal-body">
                    <div class="col">
                        <h6 class="modal-title" id="exampleModalCenterTitle"> Username  </h6>
                        <input type="text" value="{{  old('username', $item1->username)  }}" class="form-control" name="username">
                    </div>

                    <div class="col">
                        <h6 class="modal-title" id="exampleModalCenterTitle"> Nama  </h6>
                        <input type="text" value="{{  old('nama', $item1->nama)  }}" class="form-control" name="nama">
                    </div>

                    <div class="col">
                        <h6 class="modal-title" id="exampleModalCenterTitle"> Status  </h6>
                        <select name="role" id="" class="form-control">
                            @if ($item1->role == 'ADMIN')
                                <option value="ADMIN" selected> ADMIN </option>
                                <option value="VERIFIKATOR" >  VERIFIKATOR </option>
                            @else
                            <option value="ADMIN"> ADMIN </option>
                            <option value="VERIFIKATOR" selected>  VERIFIKATOR </option>
                            @endif
                        </select>
                    </div>

                    <div class="col">
                        <h6 class="modal-title" id="exampleModalCenterTitle"> Status  </h6>
                        <select name="status_aktif" id="" class="form-control">
                            @if ($item1->status_aktif == 'N')
                                <option value="N" selected> Tidak Aktif </option>
                                <option value="Y" >  Aktif </option>
                            @else
                                <option value="N"> Tidak Aktif </option>
                                <option value="Y" selected>  Aktif </option>
                            @endif
                        </select>
                    </div>
                    
                   
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

@push('addon-script')
<script>
    window.setTimeout(function() {
     $(".autohide").fadeTo(200, 0).slideUp(500, function() {
         $(this).remove();
     });
 }, 4000);
</script>
@endpush