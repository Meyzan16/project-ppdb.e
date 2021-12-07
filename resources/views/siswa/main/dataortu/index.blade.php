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


    @if ($item->jenkel == '')
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
    @elseif($item->nik_ayah != '')
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
              <h4 class="card-title">Form Data Orang Tua</h4>
              <p class="card-description text-danger">
                Data yang sudah disimpan, tidak bisa diubah. mohon dikoreksi kembali data anda
              </p>
            <form class="forms-sample" action="{{ route('data-ortu.update', $item->nisn) }}" method="POST">
              @method('PUT')
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
                  <option value="Tidak sekolah" @if (old('pendidikan_ayah') == "Tidak sekolah") {{ 'selected' }} @endif> Tidak sekolah   </option>
                  <option value="SD Sederajat" @if (old('pendidikan_ayah') == "SD Sederajat") {{ 'selected' }} @endif> SD Sederajat </option>
                  <option value="SMP Sederajat" @if (old('pendidikan_ayah') == "SMP Sederajat") {{ 'selected' }} @endif> SMP Sederajat </option>
                  <option value="SMA Sederajat" @if (old('pendidikan_ayah') == "SMA Sederajat") {{ 'selected' }} @endif> SMA Sederajat </option>
                  <option value="D1" @if (old('pendidikan_ayah') == "D1") {{ 'selected' }} @endif> D1 </option>
                  <option value="D2" @if (old('pendidikan_ayah') == "D2") {{ 'selected' }} @endif> D2 </option>
                  <option value="D3" @if (old('pendidikan_ayah') == "D3") {{ 'selected' }} @endif> D3 </option>
                  <option value="D4/S1" @if (old('pendidikan_ayah') == "D4/S1") {{ 'selected' }} @endif> D4/S1 </option>
                  <option value="S2" @if (old('pendidikan_ayah') == "S2") {{ 'selected' }} @endif> S2 </option>
                  <option value="S3" @if (old('pendidikan_ayah') == "S3") {{ 'selected' }} @endif> S3 </option>
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
                  <option value="Tidak bekerja" @if (old('pekerjaan_ayah') == "Tidak bekerja") {{ 'selected' }} @endif> Tidak bekerja   </option>
                  <option value="Nelayan" @if (old('pekerjaan_ayah') == "Nelayan") {{ 'selected' }} @endif> Nelayan </option>
                  <option value="Peternak" @if (old('pekerjaan_ayah') == "Peternak") {{ 'selected' }} @endif> Peternak </option>
                  <option value="PNS/TNI/POLRI" @if (old('pekerjaan_ayah') == "PNS/TNI/POLRI") {{ 'selected' }} @endif> PNS/TNI/POLRI </option>
                  <option value="Karyawan Swasta" @if (old('pekerjaan_ayah') == "Karyawan Swasta") {{ 'selected' }} @endif> Karyawan Swasta </option>
                  <option value="Pedagang" @if (old('pekerjaan_ayah') == "Pedagang") {{ 'selected' }} @endif> Pedagang </option>
                  <option value="Wiraswasta" @if (old('pekerjaan_ayah') == "Wiraswasta") {{ 'selected' }} @endif> Wiraswasta </option>
                  <option value="Wirausaha" @if (old('pekerjaan_ayah') == "Wirausaha") {{ 'selected' }} @endif> Wirausaha </option>
                  <option value="Buruh" @if (old('pekerjaan_ayah') == "Buruh") {{ 'selected' }} @endif> Buruh </option>
                  <option value="Pensiunan" @if (old('pekerjaan_ayah') == "Pensiunan") {{ 'selected' }} @endif> Pensiunan </option>
                  <option value="Meninggal Dunia" @if (old('pekerjaan_ayah') == "Meninggal Dunia") {{ 'selected' }} @endif> Meninggal Dunia </option>
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
                  
                  <option value="Kurang dari 500,000" @if (old('penghasilan_bulanan_ayah') == "Kurang dari 500,000") {{ 'selected' }} @endif> Kurang dari 500.000,00   </option>
                  <option value="500.000 - 999.999" @if (old('penghasilan_bulanan_ayah') == "500.000 - 999.999") {{ 'selected' }} @endif> 500.000,00 - 999.999,00 </option>
                  <option value="1 juta - 1.999.999 Juta" @if (old('penghasilan_bulanan_ayah') == "1 juta - 1.999.999 Juta") {{ 'selected' }} @endif> 1 juta - 1.999.999 Juta </option>
                  <option value="2 juta - 4.999.999 Juta" @if (old('penghasilan_bulanan_ayah') == "2 juta - 4.999.999 Juta") {{ 'selected' }} @endif> 2 juta - 4.999.999 Juta </option>
                  <option value="5 juta - 9.999.999 juta" @if (old('penghasilan_bulanan_ayah') == "5 juta - 9.999.999 juta") {{ 'selected' }} @endif> 5 juta - 9.999.999 juta </option>
                  <option value="10 juta - 19.999.999 juta" @if (old('penghasilan_bulanan_ayah') == "10 juta - 19.999.999 juta") {{ 'selected' }} @endif> 10 juta - 19.999.999 juta </option>
                  <option value="lebih dari 20 juta" @if (old('penghasilan_bulanan_ayah') == "lebih dari 20 juta") {{ 'selected' }} @endif> lebih dari 20 juta </option>
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
                  <option value="Tidak sekolah" @if (old('pendidikan_ibu') == "Tidak sekolah") {{ 'selected' }} @endif> Tidak sekolah   </option>
                  <option value="SD Sederajat" @if (old('pendidikan_ibu') == "SD Sederajat") {{ 'selected' }} @endif> SD Sederajat </option>
                  <option value="SMP Sederajat" @if (old('pendidikan_ibu') == "SMP Sederajat") {{ 'selected' }} @endif> SMP Sederajat </option>
                  <option value="SMA Sederajat" @if (old('pendidikan_ibu') == "SMA Sederajat") {{ 'selected' }} @endif> SMA Sederajat </option>
                  <option value="D1" @if (old('pendidikan_ibu') == "D1") {{ 'selected' }} @endif> D1 </option>
                  <option value="D2" @if (old('pendidikan_ibu') == "D2") {{ 'selected' }} @endif> D2 </option>
                  <option value="D3" @if (old('pendidikan_ibu') == "D3") {{ 'selected' }} @endif> D3 </option>
                  <option value="D4/S1" @if (old('pendidikan_ibu') == "D4/S1") {{ 'selected' }} @endif> D4/S1 </option>
                  <option value="S2" @if (old('pendidikan_ibu') == "S2") {{ 'selected' }} @endif> S2 </option>
                  <option value="S3" @if (old('pendidikan_ibu') == "S3") {{ 'selected' }} @endif> S3 </option>
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
                  <option value="Tidak bekerja" @if (old('pekerjaan_ibu') == "Tidak bekerja") {{ 'selected' }} @endif> Tidak bekerja   </option>
                  <option value="Nelayan" @if (old('pekerjaan_ibu') == "Nelayan") {{ 'selected' }} @endif> Nelayan </option>
                  <option value="Peternak" @if (old('pekerjaan_ibu') == "Peternak") {{ 'selected' }} @endif> Peternak </option>
                  <option value="PNS/TNI/POLRI" @if (old('pekerjaan_ibu') == "PNS/TNI/POLRI") {{ 'selected' }} @endif> PNS/TNI/POLRI </option>
                  <option value="Karyawan Swasta" @if (old('pekerjaan_ibu') == "Karyawan Swasta") {{ 'selected' }} @endif> Karyawan Swasta </option>
                  <option value="Pedagang" @if (old('pekerjaan_ibu') == "Pedagang") {{ 'selected' }} @endif> Pedagang </option>
                  <option value="Wiraswasta" @if (old('pekerjaan_ibu') == "Wiraswasta") {{ 'selected' }} @endif> Wiraswasta </option>
                  <option value="Wirausaha" @if (old('pekerjaan_ibu') == "Wirausaha") {{ 'selected' }} @endif> Wirausaha </option>
                  <option value="Buruh" @if (old('pekerjaan_ibu') == "Buruh") {{ 'selected' }} @endif> Buruh </option>
                  <option value="Pensiunan" @if (old('pekerjaan_ibu') == "Pensiunan") {{ 'selected' }} @endif> Pensiunan </option>
                  <option value="Meninggal Dunia" @if (old('pekerjaan_ibu') == "Meninggal Dunia") {{ 'selected' }} @endif> Meninggal Dunia </option>
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
                  <option value="Kurang dari 500,000" @if (old('penghasilan_bulanan_ibu') == "Kurang dari 500,000") {{ 'selected' }} @endif> Kurang dari 500.000,00   </option>
                  <option value="500.000 - 999.999" @if (old('penghasilan_bulanan_ibu') == "500.000 - 999.999") {{ 'selected' }} @endif> 500.000,00 - 999.999,00 </option>
                  <option value="1 juta - 1.999.999 Juta" @if (old('penghasilan_bulanan_ibu') == "1 juta - 1.999.999 Juta") {{ 'selected' }} @endif> 1 juta - 1.999.999 Juta </option>
                  <option value="2 juta - 4.999.999 Juta" @if (old('penghasilan_bulanan_ibu') == "2 juta - 4.999.999 Juta") {{ 'selected' }} @endif> 2 juta - 4.999.999 Juta </option>
                  <option value="5 juta - 9.999.999 juta" @if (old('penghasilan_bulanan_ibu') == "5 juta - 9.999.999 juta") {{ 'selected' }} @endif> 5 juta - 9.999.999 juta </option>
                  <option value="10 juta - 19.999.999 juta" @if (old('penghasilan_bulanan_ibu') == "10 juta - 19.999.999 juta") {{ 'selected' }} @endif> 10 juta - 19.999.999 juta </option>
                  <option value="lebih dari 20 juta" @if (old('penghasilan_bulanan_ibu') == "lebih dari 20 juta") {{ 'selected' }} @endif> lebih dari 20 juta </option>
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
