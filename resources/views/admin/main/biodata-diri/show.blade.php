
@extends('admin.layout_admin.layout')

@section('content')
<div id="main-content">
<div class="page-heading">
    <h3>Detail Data {{ $query->name }}</h3>
</div>

<div class="page-content">
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-10 col-12">
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
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <button type="button" class="mb-2 btn btn-danger" aria-label="Left Align" onclick="location.href='{{ route('admin.biodata-diri.index') }}'">
                                                <span class="fa fa-arrow-circle-left"> Kembali</span>
                                            </button>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <div class="row">

                                                        <div class="col-lg-3 col-md-8">	
                                                            <img style="border-radius: 10px; border: 2px solid transparent;" src="/kamu.png" class='img-responsive img-thumbnail w-100'/>	<br>	
                                                        </div>
                    
                                                        <div class="col-lg-9 col-md-78">
                                                            <table class='table table-striped'>
                                                                <tr>
                                                                    <th scope='row'>Nisn</th>
                                                                    <td id="">{{ $query->nisn }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Nama</th>
                                                                    <td id="">{{ $query->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Email</th>
                                                                    <td id="">{{ $query->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Username</th>
                                                                    <td id="">{{ $query->username }}</td>
                                                                </tr>

                                                                @if ($query->status_tb_biodata == 'N') 
                                                                    <tr>
                                                                        <th scope='row'>Status Verifikasi</th>
                                                                        <span class="badge bg-danger">Gagal Diverifikasi</span>
                                                                    </tr>
                                                                @elseif($query->status_tb_biodata == 'Y')
                                                                    <tr>
                                                                        <th scope='row'>Status Verifikasi</th>
                                                                        <td>
                                                                            <span class="badge bg-success">Selesai Diverifikasi</span>
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
                                                            
                                                                	
                                                                	
                                                            </table>
                                                        </div>
                                                   

                                                        <legend></legend>
                                                        <div class="col-lg-12 col-md-12">
                                                            <table class='table table-striped'>	
                                                                
                                                                <tr>
                                                                    <th scope='row'>NIK</th>
                                                                    <td>{{ $query->nik }}</td>
                                                                </tr>		
                                                                <tr>
                                                                    <th scope='row'>Tahun Masuk</th>
                                                                    <td>{{ $query->tahun_daftar }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Jenis Kelamin</th>
                                                                    <td>{{ $query->jenkel }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Tanggal Lahir</th>
                                                                    <td>{{ $query->tgl_lahir }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Tempat Lahir</th>
                                                                    <td>{{ $query->tempat_lahir }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Agama</th>
                                                                    <td>{{ $query->nama_agama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Anak keberapa</th>
                                                                    <td>{{ $query->anak_keberapa }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Jumlah Saudara Kandung</th>
                                                                    <td>{{ $query->jml_sdr_kdg }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>No Akte</th>
                                                                    <td>{{ $query->no_akte }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Status Kewarganegaraan</th>
                                                                    <td>{{ $query->status_kewarganegaraan }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope='row'>Alamat</th>
                                                                    <td>{{ $query->alamat }}</td>
                                                                </tr>

                                                                @if ($query->rt != '') 
                                                                    <tr>
                                                                        <th scope='row'>RT</th>
                                                                        <td>
                                                                            <span class="badge bg-danger">{{ $query->rt }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>RT</th>
                                                                        <td>
                                                                            <span> - </span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                @if ($query->rw != '') 
                                                                    <tr>
                                                                        <th scope='row'>RW</th>
                                                                        <td>
                                                                            <span class="badge bg-danger">{{ $query->rw }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>RW</th>
                                                                        <td>
                                                                            <span> - </span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                <tr>
                                                                    <th scope='row'>Nama Dusun</th>
                                                                    <td>{{ $query->nama_dusun }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Kelurahan/Desa</th>
                                                                    <td>{{ $query->kelurahan_desa }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Kecamatan</th>
                                                                    <td>{{ $query->kecamatan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Kode Pos</th>
                                                                    <td>{{ $query->kode_pos }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Jenis Tinggal</th>
                                                                    <td>{{ $query->nama_jenis_tinggal }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Mode Transportasi</th>
                                                                    <td>{{ $query->nama_mode_trans }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>No Hp</th>
                                                                    <td>{{ $query->no_hp }}</td>
                                                                </tr>

                                                                @if ($query->status_KKS == 'true') 
                                                                    <tr>
                                                                        <th scope='row'>Kartu KKS</th>
                                                                        <td>
                                                                            <span class="badge bg-primary">Kartu Tersedia</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Kartu KKS</th>
                                                                        <td>
                                                                            <span class="badge bg-primary">Tidak Ada Kartu</span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                @if ($query->nomor_kks != '') 
                                                                    <tr>
                                                                        <th scope='row'>Nomor KKS</th>
                                                                        <td>
                                                                            <span>{{ $query->nomor_KKS }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Nomor KKS</th>
                                                                        <td>
                                                                            <span> - </span>
                                                                        </td>
                                                                    </tr>
                                                                @endif


                                                                @if ($query->status_KPS_PKH == 'true') 
                                                                    <tr>
                                                                        <th scope='row'>Kartu KPS/PKH</th>
                                                                        <td>
                                                                            <span class="badge bg-primary">Kartu Tersedia</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Kartu KPS/PKH</th>
                                                                        <td>
                                                                            <span class="badge bg-primary">Tidak Ada Kartu</span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                @if ($query->nomor_KPS_PKH != '') 
                                                                    <tr>
                                                                        <th scope='row'>Nomor KPS/PKH</th>
                                                                        <td>
                                                                            <span>{{ $query->nomor_KPS_PKH }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Nomor KPS/PKH</th>
                                                                        <td>
                                                                            <span> - </span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                @if ($query->status_kip== 'true') 
                                                                    <tr>
                                                                        <th scope='row'>Kartu KIP</th>
                                                                        <td>
                                                                            <span class="badge bg-primary">Kartu Tersedia</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Kartu KIP</th>
                                                                        <td>
                                                                            <span class="badge bg-primary">Tidak Ada Kartu</span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                @if ($query->nomor_kip != '') 
                                                                    <tr>
                                                                        <th scope='row'>Nomor KIP</th>
                                                                        <td>
                                                                            <span>{{ $query->nomor_kip }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Nomor KIP</th>
                                                                        <td>
                                                                            <span> - </span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                @if ($query->nama_kip != '') 
                                                                    <tr>
                                                                        <th scope='row'>Nama KIP</th>
                                                                        <td>
                                                                            <span>{{ $query->nama_kip }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Nama KIP</th>
                                                                        <td>
                                                                            <span> - </span>
                                                                        </td>
                                                                    </tr>
                                                                @endif



                                                                
                                                                @if ($query->status_lulus == 'N') 
                                                                    <tr>
                                                                        <th scope='row'>Status Lulus</th>
                                                                        <td>
                                                                            <span class="badge bg-danger">Belum Lulus</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Status Lulus</th>
                                                                        <td>
                                                                            <span class="badge bg-success">Lulus</span>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                
                                                                @if ($query->tahun_lulus != '') 
                                                                    <tr>
                                                                        <th scope='row'>Tahun Lulus</th>
                                                                        <td>
                                                                            <span class="badge bg-danger">{{ $query->tahun_lulus }}</span>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    <tr>
                                                                        <th scope='row'>Tahun Lulus</th>
                                                                        <td>
                                                                            <span> - </span>
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                                <tr>
                                                                    <th scope='row'>Berat Badan</th>
                                                                    <td>{{ $query->berat_badan }} <span>Kg</span></td>
                                                                </tr>

                                                                <tr>
                                                                    <th scope='row'>Tinggi Badan</th>
                                                                    <td>{{ $query->tinggi_badan }} <span>Cm</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Jarak Rumah Kesekolah</th>
                                                                    <td>{{ $query->jarak_rumah_sekolah }} <span>Meter</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope='row'>Waktu Tempuh</th>
                                                                    <td>{{ $query->waktu_tempuh }} <span>Meter</span></td>
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

            <form action="{{ route('admin.biodata-diri.verifikasi', [$query->nisn]) }}" method="POST">
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
