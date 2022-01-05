
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Data Biodata Diri</h3>
</div>

<div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Simple Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nisn</th>
                                <th>Nama</th>
                                <th>Status Lulus</th> 
                                <th>Status Verifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->name }}</td>    
                                @if ($item->status_lulus == 'N') 
                                    <td>
                                        <span class="badge bg-danger">Belum Lulus</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-success">Lulus</span>
                                    </td>
                                @endif

                                @if ($item->status_tb_biodata == 'N') 
                                    <td>
                                        <span class="badge bg-danger">Gagal Diverifikasi</span>
                                    </td>
                                @elseif($item->status_tb_biodata == 'Y')
                                    <td>
                                        <span class="badge bg-success">Selesai Diverifikasi</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-primary">Belum Diverifikasi</span>
                                    </td>
                                @endif

                                <td>
                                    

                                    <a href="{{ route('admin.biodata-diri.show', $item->nisn) }}"  class="badge bg-info"><span data-feather="eye">Detail</span></a>
                                        
                                    {{-- aturan default resource tambahakan edit di belakang --}}
                                    <a href="{{ route('admin.biodata-diri.edit', $item->nisn) }}"  class="badge bg-warning"><span data-feather="edit">Edit</span></a>

                                    <form action="" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Yakin Hapus Data')" >Hapus <span data-feather="x-circle"> </span>
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
