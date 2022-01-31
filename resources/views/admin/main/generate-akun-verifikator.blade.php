
@extends('admin.layout_admin.layout')

@section('content')

<div id="main-content">
    <div class="page-heading">
        <h3>Generate Akun Verifikator</h3>
    </div>

<div class="page-content">
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Generate Akun Verifikator </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            @if(session()->has('success'))
                            <div class="autohide">
                                <div class="alert alert-success autohide" role="alert">
                                 {{ session('success') }}
                                </div>    
                            </div>
                            @endif


                            <form class="form" action="{{ route('generate-akun-verifikator.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama</label>
                                            <input type="text" required  value="{{ old('nama') }}" class="form-control @error('nama')is-invalid @enderror"
                                                placeholder="nama" name="nama">
                                                @error('nama') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Username</label>
                                            <input type="text" required  value="{{ old('username') }}" class="form-control @error('username')is-invalid @enderror"
                                                placeholder="username" name="username">
                                                @error('username') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column"> Password </label>
                                            <input type="text" required class="form-control @error('password')is-invalid @enderror"  value="{{ old('password') }}"
                                                placeholder="Password" name="password">
                                                @error('password') 
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>
                                    </div>                                   
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Simpan</button>
                                            {{-- <a href="{{  }}"  class="btn btn-warning me-1 mb-1" > cancel </a> --}}
                                        
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
    
@endsection

@push('addon-script')
<script>
    window.setTimeout(function() {
     $(".autohide").fadeTo(200, 0).slideUp(500, function() {
         $(this).remove();
     });
 }, 4000);
</script>
@endpush