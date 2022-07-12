@extends('layouts.main')
<!-- container -->
@section('container')
<!-- Navbar -->
@include('partials.navbar')
<!-- Sidebar -->
@include('partials.sidebar')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-success text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card ">
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
          <p class="card-header" style="margin-bottom: 20px;">Menu Utama</p>
          <div class="row justify-content no-gutters text-center">
            <div class="col mb-3" style="margin-right: 5px">
              <a href="/jadwal" class="mb-1   text-white text-center">
                <span><span><img src="{{ asset('NiceAdmin/') }}/assets/img/jadwal.png" alt="" width="50"></span>
              </a>
              <p class="text-secondary"><small>Jadwal Kegiatan</small></p>
            </div>
            <div class="col mb-3" style="margin-right: 5px">
              <a href="/tagihan" class="mb-1   text-white text-center">
                <span><img src="{{ asset('NiceAdmin/') }}/assets/img/pembayaran.png" alt="" width="50"></span>
              </a>
              <p class="text-secondary"><small>Pembayaran</small></p>
            </div>
            <div class="col mb-3" style="margin-right: 5px">
              <a href="/riwayat-pembayaran" class="mb-1 text-white text-center">
                <span><img src="{{ asset('NiceAdmin/') }}/assets/img/history.png" alt="" width="50"></span>
              </a>
              <p class="text-secondary"><small>History Pembayaran</small></p>
            </div>
           
            
          </div>
          <div class="row justify-content no-gutters text-center">
            <div class="col mb-3" style="margin-right: 5px">
              <a href="hafalan-santri" class="mb-1   text-white text-center">
                  <span><img src="{{ asset('NiceAdmin/') }}/assets/img/hafalan.png" alt="" width="50"></span>
              </a>
              <p class="text-secondary"><small>Pencapaian Prestasi</small></p>
            </div>
            <div class="col mb-3 text-center" style="margin-right: 5px">
              <a href="pengumuman" class="mb-1   text-white text-center">
                  <span><img src="{{ asset('NiceAdmin/') }}/assets/img/info.png" alt="" width="50"></span>
              </a>
              <p class="text-secondary"><small>Info Santri</small></p>
            </div>
            <div class="col mb-3 text-center" style="margin-right: 5px">
              <a href="/nilai" class="mb-1   text-white text-center" >
                <span><img src="{{ asset('NiceAdmin/') }}/assets/img/exam.png" alt="" width="50"></i></span>
              </a>
              <p class="text-secondary"><small>Nilai</small></p>
            </div>
          </div>
    </div>
    </div>
    </div>
    </div>
   <div class="row">
     <div class="col-md-6 grid-margin stretch-card">
       <div class="card">
         <div class="card-body">
           <div class="card-header" style="margin-bottom: 20px">Jadwal Kegiatan Hari Ini</div>
          <div class="card-list-group">
            <div class="list-group-item list-group-item" aria-current="true" style="margin-bottom: 10px">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">Sekolah Formal</h6>
              </div>
              <p class="mb-1">Pukul 07.00 - 13.00 WIB</p>
              <p><small>Tempat : Sekolah masing-masing</small></p>
              <p><small class="badge rounded bg-danger">Telah selesai</small></p>
            </div>
            <div class="list-group-item list-group-item" aria-current="true" style="margin-bottom: 10px">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">Madrasah</h6>
              </div>
              <p class="mb-1">Pukul 13.30 - 15.30 WIB</p>
              <p><small>Tempat : Kelas 2</small></p>
              <p><small class="badge rounded bg-success">Sedang berlansung</small></p>
            </div>
            <div class="list-group-item list-group-item" aria-current="true" style="margin-bottom: 10px">
              <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1">Pengajian Sore</h6>
              </div>
              <p class="mb-1">Pukul 16.00 - 17.30 WIB</p>
              <p><small>Tempat : Mushola</small></p>
              <p><small class="badge rounded bg-warning">Akan datang</small></p>
            </div>
          </div>
         </div>
       </div>
     </div>
   <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="card-header" style="margin-bottom: 20px">Pengumuman</div>
       <div class="card-list-group">
         <div class="list-group-item list-group-item" aria-current="true" style="margin-bottom: 10px">
           <div class="d-flex w-100 justify-content-between">
             <h6 class="mb-1">Judul Pengumuman 1</h6>
           </div>
           <p><small>10/20/20</small></p>
           <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ad amet nisi quidem maiores magnam dolor</small></p>
           <div class="text-center">
           <p><small class="btn btn-sm btn-success">Selengkapnya</small></p>
         </div>
        </div>
        <div class="list-group-item list-group-item" aria-current="true" style="margin-bottom: 10px">
          <div class="d-flex w-100 justify-content-between">
            <h6 class="mb-1">Judul Pengumuman 1</h6>
          </div>
          <p><small>10/20/20</small></p>
          <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ad amet nisi quidem maiores magnam dolor</small></p>
          <div class="text-center">
            <p><small class="btn btn-sm btn-success">Selengkapnya</small></p>
        </div>
       </div>
       <div class="list-group-item list-group-item" aria-current="true" style="margin-bottom: 10px">
        <div class="d-flex w-100 justify-content-between">
          <h6 class="mb-1">Judul Pengumuman 1</h6>
        </div>
        <p><small>10/20/20</small></p>
        <p><small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ad amet nisi quidem maiores magnam dolor</small></p>
        <div class="text-center">
          <p><small class="btn btn-sm btn-success">Selengkapnya</small></p>
      </div>
     </div>
      </div>
    </div>
  </div>
  </div>
          <!-- selesai content -->
          <!-- Footer -->
          @include('partials.footer')
  


        </div>
      </div>
    </div>