
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
    <div class="page-heading">
        <h3>Data Siswa</h3>
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
                        <a href="{{ route('admin.biodata-diri.trash') }}" class='sidebar-link'>
                            <i class="fas fa-trash-alt"></i>
                            <span>Tempat Sampah</span>
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
                                    <th>Status Lulus</th> 
                                    <th>Status Data Diri</th>
                                    <th>Status Akhir</th>
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
                                        <span class="badge bg-primary">Belum Diverifikasi</span>
                                    </td>

                                    <td>

                                            @php
                                                $a = "";
                                            @endphp
                    
                                            @if ($item->tb_ortu->status_ortu == 'Y')
                                                <?php $a = "Verifikasi Diterima" ?>
                                            @elseif($item->tb_ortu->status_ortu == 'N')
                                                <?php $a = "Verifikasi Ditolak" ?>
                                            @else
                                                <?php $a = "Belum Diverifikasi" ?>
                                            @endif

                                            <a class="badge bg-info dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown"
                                               > <span> data</span> </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('admin.data-ortu.show', $item->nisn) }}">Orang Tua <span>({{ $a }})</span> </a> </li>
                                                <li><a class="dropdown-item" href="#">Berkas <span>({{ $item->tb_berkas->status_akhir }})</span></a></li>
                                            </ul>
                                           
                                     

                                        <a href="{{ route('admin.biodata-diri.show', $item->nisn) }}"  class="badge bg-primary"> <i class="fa fa-eye"> </i> </a>
                                            
                                        {{-- aturan default resource tambahakan edit di belakang --}}
                                        <a href="{{ route('admin.biodata-diri.edit', $item->nisn) }}"  class="badge bg-warning">  <i class="fa fa-edit"> </i>  </a>

                              
                                        <form action="{{ route('admin.biodata-diri.destroy', $item->id) }}" method="POST" class="d-inline">
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
