@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">File Berkas</h3>
          <h6 class="font-weight-normal mb-0">
              Silahkan perbarui data terlebih dahulu
          </h6>
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

  <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
            <button class="btn btn-secondary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Berkas</button>
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


    @if ($item->nik_ayah == '')
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body">
                <h5 class="card-title text-center" style="color: green; font-size:20px;">Maaf, silahkan lengkapi data orang tua dahulu</h5>
                <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
              </div>
            </div>
            </div>
        </div>
    @elseif($item->kartu_keluarga != '')
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-body">
            <h5 class="card-title text-center" style="color: black; font-size:20px;">Maaf form ini sudah selesai, data anda {{ $item->status_tb_biodata }}</h5>
            
            <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
          </div>
        </div>
      </div>
    </div>
    @else
      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-body">
              <h4 class="card-title">Form Data File Berkas</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
            <form class="forms-sample" action="{{ route('data-ortu.update', $item->nisn) }}" enctype="multipart/form-data" method="POST">
              {{ method_field('PATCH') }}
              @csrf

              <h4 class="text-center">Berkas Yang Dilengkapi</h4>

              <div class="form-group">
                <label>File Kartu Keluarga</label>
                <input type="file" name="kartu_keluarga" style="border-radius: 30px" class="form-control @error('kartu_keluarga')is-invalid @enderror"  placeholder="Kartu Keluarga" value="{{ old('kartu_keluarga') }}">
                        @error('kartu_keluarga') 
                        <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                        </div>
                    @enderror
              </div>

              <div class="form-group">
                <label>File Kartu Keluarga</label>
                <input type="file" name="kartu_keluarga" style="border-radius: 30px" class="form-control @error('kartu_keluarga')is-invalid @enderror"  placeholder="Kartu Keluarga" value="{{ old('kartu_keluarga') }}">
                        @error('kartu_keluarga') 
                        <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                        </div>
                    @enderror
              </div>

             
             
                <button type="submit" class="btn btn-primary mr-2" style="border-radius: 30px;" onclick="return confirm('Apakah data anda sudah benar ?')" >Kirim</button>
                <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
              </form>
                
            </div>
          </div>
        </div>
      </div>
    @endif

  

  
  <div class="row">
  </div>

</div>

@endsection

@push('addon-script')

<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
  Vue.use(Toasted);

  var kks = new Vue({
    el: "#KKS",
    mounted() {
      AOS.init();
    },
    data: {
      status_KKS: true,
      nomor_kks: "",
    }
  });
</script>
@endpush
