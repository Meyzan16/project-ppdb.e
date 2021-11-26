@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Biodata Diri</h3>
          <h6 class="font-weight-normal mb-0">

            @if($item->nik == '')
              Silahkan perbarui data terlebih dahulu
            @else
            <span>Silahkan perbarui data biodata diri tambahan </span>
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
    
        @if($item->nik == '')
            <button class="btn btn-primary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Anda</button>
        @else
            <button class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Tambahan </button>
        @endif
         
          {{-- dimunculkan jika data di tabel siswa sudah terisi --}}
          {{-- <button type="button" class="btn btn-secondary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Ortu</button>
          <button type="button" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Lengkapi Berkas</button> --}}
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


    @if ($item->nik == '')
        <div class="row">
          <div class="col-md-6 grid-margin stretch-card" >
              <div class="card tale-bg">
                  <div class="card-body">
                  <h4 class="card-title">Data Utama</h4>
                  <p class="card-description text-danger">
                      Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
                  </p>

                  <form class="forms-sample" action="{{ route('biodataStore', $item->nisn) }}"  method="POST">
                    @csrf
                      <div class="form-group">
                      <label>Nisn</label>
                      <input type="text" name="nisn" style="border-radius: 30px" readonly class="form-control  @error('nisn')is-invalid @enderror"  placeholder="NISN"  value="{{ $item->nisn }}">
                      <p class="text-danger" style="font-size: 13px">Silahkan perbarui nisn sama admin jika ada kesalahan</p>
                      @error('nisn') 
                            <div class="invalid-feedback">
                              kesalahan : {{ $message }}
                            </div>
                      @enderror
                    </div>

                      <div class="form-group">
                      <label>Nik</label>
                      <input type="text" name="nik" style="border-radius: 30px" required class="form-control  @error('nik')is-invalid @enderror"  placeholder="NIK" value="{{ old('nik') }}">
                      @error('nik') 
                      <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                      </div>
                   @enderror
                    </div>

                      <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="name" style="border-radius: 30px" required class="form-control  @error('name')is-invalid @enderror"  placeholder="NAMA" value="{{ $item->name; }}">
                      <p class="text-danger" style="font-size: 13px">Silahkan perbarui nama jika ada kesalahan</p>
                      @error('name') 
                      <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                      </div>
                    @enderror  
                    </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" style="border-radius: 30px" required class="form-control  @error('username')is-invalid @enderror"  placeholder="USERNAME"  value="{{ old('username') }}" >
                        @error('username') 
                        <div class="invalid-feedback">
                          kesalahan : {{ $message }}
                        </div>
                    @enderror
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" style="border-radius: 30px" required  class="form-control  @error('password')is-invalid @enderror"  placeholder="PASSWORD"  >
                        <p class="text-danger" style="font-size: 13px">Disarankan untuk perbarui password </p>
                        @error('password') 
                            <div class="invalid-feedback">
                              kesalahan : {{ $message }}
                            </div>
                        @enderror
                      </div>

                      <div class="form-group">
                      <label >Email</label>
                      <input type="text" name="email" style="border-radius: 30px" required class="form-control  @error('email')is-invalid @enderror"  placeholder="EMAIl" value="{{ old('email') }}">
                      @error('email') 
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

    @else
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-body">
              <h4 class="card-title">Data Tambahan</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
            <form class="forms-sample" action="{{ route('data-tambahan.update', $item->nisn) }}" method="POST">
              @method('PUT')
              @csrf
                
                  
                  {{-- KKS --}}

                <div class="form-group" id="KKS" >
                  <label>Penerima Kartu Kelurga Sejahtera</label>
                  <p class="text-muted"></p>

                    <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          class="custom-control-input"
                          name="is_store_open_kks"
                          id="openKKSTrue"
                          v-model="is_store_open_kks"
                          :value="true"
                        />
                        <label for="openKKSTrue" class="custom-control-label">
                          Ada
                        </label>
                    </div>

                    <div
                        class="custom-control custom-radio custom-control-inline"
                      >
                        <input
                          type="radio"
                          class="custom-control-input"
                          name="is_store_open_kks"
                          id="openKKSFalse"
                          v-model="is_store_open_kks"
                          :value="false"
                        />
                        <label for="openKKSFalse" class="custom-control-label">
                          Tidak Ada
                        </label>
                    </div>
                    <br>
                    <span class="text-danger" style="font-size: 10px">Nomor Kartu Keluarga Sejahtera (jika memiliki). Nomor yang dimaksud adalah 6 digit kode yang tertera pada sisi belakang kiri atas kartu (di bawah
                      lambang Garuda Pancasila).
                      Peserta didik dinyatakan sebagai anggota KKS apabila tercantum di dalam kartu keluarga dengan kepala keluarga pemegang KKS. Sebagai contoh,
                      peserta didik tercantum pada KK dengan kepala keluarganya adalah kakek. Apabila kakek peserta didik tersebut pemegang KKS, maka nomor KKS
                      milik kakek peserta didik yang bersangkutan dapat diisikan pada kolom ini</span>
               
                      
                      <div class="form-group" v-if="is_store_open_kks">
                        <label>Nomor Kartu KKS</label>
                        <input type="text" value="{{ old('nomor_kks') }}" class="form-control @error('nomor_kks') is-invalid @enderror" autocomplete  name="nomor_kks"  />
                        @error('nomor_kks') 
                          <div class="invalid-feedback">
                            kesalahan : {{ $message }}
                          </div>
                        @enderror

                      </div>
                </div>
                      
                     
              
                <button type="submit" class="btn btn-primary mr-2" style="border-radius: 30px;" onclick="return confirm('Apakah data anda sudah benar ?')" >Kirim</button>
                <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
              </form>
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

  // var kewarganegaraan = new Vue({
  //   el: "#kewarganegaraan",
  //   mounted() {
  //     AOS.init();
  //   },

  //   data: {
  //     is_store_open: true,
  //     warga_negara: "",
  //   },
  // });

  var kks = new Vue({
    el: "#KKS",
    mounted() {
      AOS.init();
    },

    data: {
      is_store_open_kks: true,
      nomor_kks: "",
    }
  });

  // var pkh = new Vue({
  //   el: "#pkh",
  //   mounted() {
  //     AOS.init();
  //   },

  //   data: {
  //     is_store_open_pkh: true,
  //     name_pkh: "",
  //   }
  // });

  // var kip = new Vue({
  //   el: "#kip",
  //   mounted() {
  //     AOS.init();
  //   },

  //   data: {
  //     is_store_open_kip: true,
  //     name_kip: "",
  //   },
  // });




  
</script>
@endpush