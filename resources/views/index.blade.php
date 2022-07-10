@extends('layouts.main')
<!-- container -->
@section('container')
<!-- Navbar -->
@include('umum.navbar')

<!-- Sidebar -->
@include('umum.sidebar')

        <!-- content -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-success text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Home
              </h3>
            </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3>WELCOME TO SI MAS DHOR</h3>
                  <p><small>Sistem Monitoring Akademik Santri Perguruan Islam Pesantren Al-Muntadhor</small></p>
                  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      @foreach($tampilContent as $gallery)
                      <div class="carousel-item active">
                        <img src="{{ URL::to('/')}}/content/{{ $gallery->gambar }}" class="d-block w-100" alt="...">
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body text-center">
                <p class="card-header" style="margin-bottom: 20px;">Menu Umum</p>
                <div class="row justify-content no-gutters text-center">
                  <a href="/about"class="col mb-3 text-center" style="margin-right: 20px">
                      <div class="card mb-1 bg-gradient-success  text-white text-center" >
                        <span><i class="fas fa-building" style="margin: 21px;"></i></span>
                      </div>
                      <p class="text-secondary"><small>About Ponpes</small></p>
                    </a>
                  <a href="/info" class="col mb-3" style="margin-right: 20px">
                    <div class="card mb-1 bg-gradient-success  text-white text-center">
                      <span><i class="fas fa-info-circle" style="margin: 21px;"></i></span>
                    </div>
                    <p class="text-secondary"><small>Informasi</small></p>
                  </a>
                </div>

                <div class="row justify-content no-gutters text-center">
                <a href="/gallery-content" class="col mb-3" style="margin-right: 20px">
                  <div class="card mb-1 bg-gradient-success  text-white text-center">
                    <span><i class="fas fa-photo-video" style="margin: 21px;"></i></span>
                  </div>
                  <p class="text-secondary"><small>Gallery</small></p>
                </a>
                <a href="/login-page" class="col mb-3" style="margin-right: 20px">
                  <div class="card mb-1 bg-gradient-success  text-white text-center">
                    <span><i class="fas fa-sign-in-alt" style="margin: 21px;"></i></span>
                  </div>
                  <p class="text-secondary"><small>Login</small></p>
                </a>
                </div>
            </div>
          </div>
          </div>
        
          <!-- selesai content -->
          <!-- Footer -->
         @include('umum.footer')
        </div>
      </div>
   