@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome, {{ session()->get('nama') }}</h3>
          <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
        </div>
        <div class="col-12 col-xl-4">
         <div class="justify-content-end d-flex">
       
            <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
             <i class="mdi mdi-calendar"></i> 
             <?php  $tgl=date('l, d-m-Y'); ?>
             {{ $tgl; }}
            </button>
            
       
         </div>
        </div>
      </div>
    </div>
  </div>

  @if (session()->has('success'))
      <div class="row">
        <div class="col-md-8">
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        </div>
      </div>
      @endif


  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card tale-bg">
        <div class="card-people mt-auto">
          <img src="/template-siswa/template/images/dashboard/people.svg" alt="people">
          <div class="weather-info">
            <div class="d-flex">
              <div>
                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
              </div>
              <div class="ml-2">
                <h4 class="location font-weight-normal">Bangalore</h4>
                <h6 class="font-weight-normal">Indonesia</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">

        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <h4 class="mb-4">Data Biodata Diri</h4>
              @if ($query->tb_biodata->status_tb_biodata == 'N' && $query->tb_biodata->catatan_biodata != '') 
                 <h5 class="mb-2">Status : Verifikasi Ditolak</h5>
              @elseif($query->tb_biodata->status_tb_biodata == 'Y' && $query->tb_biodata->catatan_biodata == '')
                 <h5 class="mb-2">Status : Verifikasi Diterima</h5>
              @elseif($query->tb_biodata->status_tb_biodata == 'Y' && $query->tb_biodata->catatan_biodata != '')
                <h5 class="mb-2">Status : Menunggu diverifikasi ulang</h5>
              @elseif($query->tb_biodata->status_tb_biodata == 'belum diverifikasi' && $query->tb_biodata->catatan_biodata == '')
                <h5 class="mb-2">Status : Belum Diverifikasi</h5>
              @endif

             
             
              @if ($query->tb_biodata->catatan_biodata != '' && $query->tb_biodata->status_tb_biodata == 'N')
              <button type="button" class="mb-2 btn btn-outline-danger block" data-toggle="modal" data-target="#exampleModalCenter">
                &nbsp;Catatan Kesalahan
              </button>
              @endif

              <p>Waktu diperbarui : {{ $query->tb_biodata->updated_at }}</p>

            </div>
          </div>
        </div>

        
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">

              <h4 class="mb-4">Data Orang Tua</h4>
              @if ($query->tb_ortu->status_ortu == 'N' && $query->tb_ortu->catatan_ortu != '') 
                 <h5 class="mb-2">Status : Verifikasi Ditolak</h5>
              @elseif($query->tb_ortu->status_ortu == 'Y' && $query->tb_ortu->catatan_ortu == '')
                 <h5 class="mb-2">Status : Verifikasi Diterima</h5>
              @elseif($query->tb_ortu->status_ortu == 'Y' && $query->tb_ortu->catatan_ortu != '')
                <h5 class="mb-2">Status : Menunggu diverifikasi ulang</h5>
              @elseif($query->tb_ortu->status_ortu == 'belum diverifikasi' && $query->tb_ortu->catatan_ortu == '')
                <h5 class="mb-2">Status : Belum Diverifikasi</h5>
              @endif

             
             
              @if ($query->tb_ortu->catatan_ortu != '' && $query->tb_ortu->status_ortu == 'N')
              <button type="button" class="mb-2 btn btn-outline-danger block" data-toggle="modal" data-target="#exampleModalOrtu">
                &nbsp;Catatan Kesalahan
              </button>
              @endif

              <p>Waktu diperbarui : {{ $query->tb_ortu->updated_at }}</p>


            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Number of Meetings</p>
              <p class="fs-30 mb-2">34040</p>
              <p>2.00% (30 days)</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Number of Clients</p>
              <p class="fs-30 mb-2">47033</p>
              <p>0.22% (30 days)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
 

  
  <div class="row">
  </div>

</div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Catatan Kesalahan Biodata Diri</h5>
        <button type="button" class="close" data-bs-dismiss="modal"
            aria-label="Close">
            <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <p>
          {!! $query->tb_biodata->catatan_biodata  !!}
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button type="button" class="mb-2 btn btn-primary" aria-label="Left Align" onclick="location.href='{{ route('siswa.biodata-diri.perbaikan_data', $query->tb_biodata->nisn_biodata) }}'">
          <i class="fa fa-arrow-circle-left"> </i> Perbaiki Data
        </button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalOrtu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Catatan Kesalahan Data Ortu</h5>
        <button type="button" class="close" data-bs-dismiss="modal"
            aria-label="Close">
            <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <p>
          {!! $query->tb_ortu->catatan_ortu  !!}
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button type="button" class="mb-2 btn btn-primary" aria-label="Left Align" onclick="location.href='{{ route('siswa.data-ortu.perbaikan_data', $query->tb_ortu->nisn_ortu) }}'">
          <i class="fa fa-arrow-circle-left"> </i> Perbaiki Data
        </button>

      </div>
    </div>
  </div>
</div>

@endsection