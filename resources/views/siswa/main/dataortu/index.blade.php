@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Biodata Orang Tua</h3>
          <h6 class="font-weight-normal mb-0">

            @if($item->nik_ayah == '')
              Silahkan perbarui data terlebih dahulu
            @endif

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
    
        @if($item->nik_ayah == '')
            <button class="btn btn-primary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Orang Tua</button>
        @endif
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


    @if ($item->jenkel == '')
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body">
                <h5 class="card-title text-center" style="color: black; font-size:20px;">Maaf, silahkan lengkapi data biodata diri anda</h5>
                </div>
            </div>
            </div>
        </div>
    @else
      <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-body">
              <h4 class="card-title">Form Data Orang Tua</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
            <form class="forms-sample" action="{{ route('data-tambahan.update', $item->nisn) }}" method="POST">
              @method('PUT')
              @csrf

              <div class="form-group">
                <label>Nik Ayah</label>
                <input type="text" name="nik_ayah" style="border-radius: 30px" required class="form-control @error('nik_ayah')is-invalid @enderror"  placeholder="Nik Ayah" value="{{ old('nik_ayah') }}">
                        @error('nik_ayah') 
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
