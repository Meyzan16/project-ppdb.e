@extends('siswa.layout_siswa.layout')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Biodata Orang Tua</h3>
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
            <button class="btn btn-secondary" style="border-radius: 30px;  margin-right:10px">Lengkapi Data Orang Tua</button>
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


    @if ($item->tb_biodata->jenkel == '')
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-body">
                <h5 class="card-title text-center" style="color: black; font-size:20px;">Maaf, silahkan lengkapi data biodata diri anda</h5>
                <a href="{{ route('biodata-diri') }}" class="btn btn-warning" style="border-radius: 30px;  margin-right:10px">Kembali</a>
              </div>
            </div>
            </div>
        </div>
    @elseif($item->tb_ortu->nik_ayah != '')
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card tale-bg">
          
          <div class="card-body">
            <h5 class="card-title text-center" style="color: green; font-size:20px;">Selamat anda sudah melengkapi data orang tua </h5>
            <h4 class="card-title text-center" style="color: black; font-size:20px;">sekarang data anda {{ $item->tb_biodata->status_tb_biodata }} </h4>
            
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
              <h4 class="card-title">Form Data Orang Tua</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
            <form class="forms-sample" action="{{ route('siswa.data-ortu.update', [$item->nisn]) }}" method="POST">
              {{ method_field('PATCH') }}
              @csrf

              <h4 class="text-center">Data Ayah</h4>

              <div class="form-group">
                <label>Nik Ayah</label>
                <input type="text" name="nik_ayah" maxlength="16" style="border-radius: 30px" class="form-control @error('nik_ayah')is-invalid @enderror"  placeholder="Nik Ayah" value="{{ old('nik_ayah') }}">
                        @error('nik_ayah') 
                        <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                        </div>
                    @enderror
              </div>

              <div class="form-group">
                <label>Nama Ayah</label>
                <input type="text" name="nama_ayah" style="border-radius: 30px" class="form-control @error('nama_ayah')is-invalid @enderror"  placeholder="Nama Ayah" value="{{ old('nama_ayah') }}">
                        @error('nama_ayah') 
                        <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                        </div>
                    @enderror
              </div>

              <div class="form-group">
                <label>Tanggal Lahir Ayah</label>
                <input type="date" name="tgl_ayah" style="border-radius: 30px" class="form-control @error('tgl_ayah')is-invalid @enderror" value="{{ old('tgl_ayah') }}">
                        @error('tgl_ayah') 
                        <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                        </div>
                    @enderror
              </div>

              <div class="form-group">
                <label>Pendidikan Ayah</label>
                <select name="pendidikan_ayah" style="border-radius: 30px" class="form-control @error('pendidikan_ayah') is-invalid @enderror" >
                    <option value="">--Pilih Data--</option>
                  @foreach ($pendidikan as $pendidikan)
                      @if(old('pendidikan_ayah') == $pendidikan->id )
                        <option value="{{ $pendidikan->id }}" selected>{{ $pendidikan->nama }}</option>      
                      @else
                        <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>    
                      @endif
                  @endforeach
                </select>
                @error('pendidikan_ayah') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>                      
                  @enderror
              </div>

              <div class="form-group">
                <label>Pekerjaan Ayah</label>
                <select name="pekerjaan_ayah" style="border-radius: 30px" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" >
                  <option value="">--Pilih Data--</option>
                  @foreach ($pekerjaan as $pekerjaan)
                      @if(old('pekerjaan_ayah') == $pekerjaan->id )
                        <option value="{{ $pekerjaan->id }}" selected>{{ $pekerjaan->nama }}</option>      
                      @else
                        <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->nama }}</option>    
                      @endif
                  @endforeach
                </select>
                @error('pekerjaan_ayah') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>                      
                  @enderror
              </div>
              
              <div class="form-group">
                <label>Penghasilan Bulanan Ayah</label>
                <select name="penghasilan_bulanan_ayah" style="border-radius: 30px" class="form-control @error('penghasilan_bulanan_ayah') is-invalid @enderror" >
                  <option value="">--Pilih Data--</option>
                  @foreach ($penghasilan as $penghasilan)
                      @if(old('penghasilan_bulanan_ayah') == $penghasilan->id )
                        <option value="{{ $penghasilan->id }}" selected>{{ $penghasilan->nama }}</option>      
                      @else
                        <option value="{{ $penghasilan->id }}">{{ $penghasilan->nama }}</option>    
                      @endif
                  @endforeach
                </select>
                @error('penghasilan_bulanan_ayah') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>                      
                  @enderror
              </div>

              <hr  color="black" size="10px">
              <h4 style="text-align: center;">Data Ibu</h4>

              {{-- ibu --}}

              <div class="form-group">
                <label>Nik Ibu</label>
                <input type="text" name="nik_ibu" maxlength="16" style="border-radius: 30px" class="form-control @error('nik_ibu')is-invalid @enderror"  placeholder="Nik Ibu" value="{{ old('nik_ibu') }}">
                        @error('nik_ibu') 
                        <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                        </div>
                    @enderror
              </div>

              <div class="form-group">
                <label>Nama Ibu</label>
                <input type="text" name="nama_ibu" style="border-radius: 30px" class="form-control @error('nama_ibu')is-invalid @enderror"  placeholder="Nama Ibu" value="{{ old('nama_ibu') }}">
                        @error('nama_ibu') 
                        <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                        </div>
                    @enderror
              </div>

              <div class="form-group">
                <label>Tanggal Lahir Ibu</label>
                <input type="date" name="tgl_ibu" style="border-radius: 30px" class="form-control @error('tgl_ibu')is-invalid @enderror" value="{{ old('tgl_ibu') }}">
                        @error('tgl_ibu') 
                        <div class="invalid-feedback">
                        kesalahan : {{ $message }}
                        </div>
                    @enderror
              </div>

              <div class="form-group">
                <label>Pendidikan Ibu</label>
                <select name="pendidikan_ibu" style="border-radius: 30px" class="form-control @error('pendidikan_ibu') is-invalid @enderror" >
                  <option value="">--Pilih Data--</option>
                    @foreach ($pendidikan_ibu as $pendidikan_ibu)
                        @if(old('pendidikan_ibu') == $pendidikan_ibu->id )
                          <option value="{{ $pendidikan_ibu->id }}" selected>{{ $pendidikan_ibu->nama }}</option>      
                        @else
                          <option value="{{ $pendidikan_ibu->id }}">{{ $pendidikan_ibu->nama }}</option>    
                        @endif
                    @endforeach
                </select>
                @error('pendidikan_ibu') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>                      
                  @enderror
              </div>

              <div class="form-group">
                <label>Pekerjaan Ibu</label>
                <select name="pekerjaan_ibu" style="border-radius: 30px" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" >
                  <option value="">--Pilih Data--</option>
                    @foreach ($pekerjaan_ibu as $pekerjaan_ibu)
                        @if(old('pekerjaan_ibu') == $pekerjaan_ibu->id )
                          <option value="{{ $pekerjaan_ibu->id }}" selected>{{ $pekerjaan_ibu->nama }}</option>      
                        @else
                          <option value="{{ $pekerjaan_ibu->id }}">{{ $pekerjaan_ibu->nama }}</option>    
                        @endif
                    @endforeach
                </select>
                @error('pekerjaan_ibu') 
                  <div class="invalid-feedback">
                    kesalahan : {{ $message }}
                  </div>                      
                  @enderror
              </div>

              <div class="form-group">
                <label>Penghasilan Bulanan Ibu</label>
                <select name="penghasilan_bulanan_ibu" style="border-radius: 30px" class="form-control @error('penghasilan_bulanan_ibu') is-invalid @enderror" >
                  <option value="">--Pilih Data--</option>
                  @foreach ($penghasilan_ibu as $penghasilan_ibu)
                  @if(old('penghasilan_bulanan_ibu') == $penghasilan_ibu->id )
                    <option value="{{ $penghasilan_ibu->id }}" selected>{{ $penghasilan_ibu->nama }}</option>      
                  @else
                    <option value="{{ $penghasilan_ibu->id }}">{{ $penghasilan_ibu->nama }}</option>    
                  @endif
              @endforeach
                </select>
                @error('penghasilan_bulanan_ibu') 
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