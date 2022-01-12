
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Siswa Yang Pernah Dihapus</h3>
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

    <div class="page-content">
            <section class="section">
                <div class="card">
                    <div class="card-header text-right">
                        <a href="{{ route('admin.sampah.restoreAll') }}" class='sidebar-link'>
                            <i class="fas fa-trash-restore"></i>
                            <span>Kembalikan semua</span>
                        </a>
                    
                    </div>

                    

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nisn</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama</th>
                                    <th>Tahun Masuk</th> 
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->tb_biodata->jenkel }}</td>   
                                    <td>{{ $item->name }}</td> 
                                    <td>{{ $item->tahun_daftar }}</td> 

                                 

                                    <td>
                                        

                                        <a href="{{ route('admin.sampah.restore', $item->nisn) }}"  class="badge bg-success"><span data-feather="eye">Restore</span></a>
                                            
                                      
                                        <a href="{{ route('admin.sampah.force-delete', $item->nisn) }}"  class="badge bg-danger"><span data-feather="edit">Hapus Permanen</span></a>

                                        
                                    </td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>

                        <button type="button" class="mb-2 btn btn-danger" aria-label="Left Align" onclick="location.href='{{ route('admin.biodata-diri.index') }}'">
                            <i class="fa fa-arrow-circle-left"></i> Kembali
                        </button>
                    </div>
                </div>
        </section>
    </div>
        
@endsection
