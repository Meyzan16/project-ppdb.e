@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Fitur Semua Data</h3>
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
        <div class="col-md-6">
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        </div>
      </div>
      @endif

  <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
    
          <a href="{{ route('biodataEdit', $item->nisn) }}" class="btn btn-primary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Anda</a>
      
          <a href="{{ route('data-ortu.edit', $item->nisn) }}" class="btn btn-secondary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Ortu</a>

            <button type="button" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Lengkapi Berkas</button> 

      </div>

  </div>

  
  
  
 

  
  <div class="row">
  </div>

</div>

@endsection