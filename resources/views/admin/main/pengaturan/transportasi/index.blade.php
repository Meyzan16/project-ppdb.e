
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Mode Transportasi</h3>
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
                                        <a href=""  class="badge bg-warning">  <i class="fa fa-edit"> </i>  </a>
                                                                    
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
        </section>
    </div>
        
@endsection
