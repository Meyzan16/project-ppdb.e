
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Jenis Tinggal Yang Dihapus</h3>
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

                    </div>


                    

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Dihapus</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->deleted_at }}</td>    

                                    <td>
                                            <a href="{{ route('admin.data-jenis-tinggal.restore', $item->id) }}"  class="badge bg-success"><span data-feather="eye">Restore</span></a>
                                    </td>
                                    

                                
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <button type="button" class="mb-2 btn btn-warning" aria-label="Left Align" onclick="location.href='{{ route('data-jenis-tinggal.index') }}'">
                            <i class="fa fa-arrow-circle-left"> </i> Kembali
                        </button>

                    </div>
                </div>
        </section>
    </div>
        
   

@endsection

