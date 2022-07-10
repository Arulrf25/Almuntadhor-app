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
          <a href="{{ URL::previous() }}" style="color:white"><i class="fas fa-arrow-circle-left"></i></a>
        </span> Tagihan Pembayaran
      </h3>
    </div>
  
    <div class="card">
        <div class="card-body">
          <div class="card-header mb-3">Tagihan Bulan Ini</div>
          <div class="list-group mb-4">
          @foreach($dataTagihan as $tagihan)
                @if ($tagihan->keterangan == 'pending')
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $tagihan->tagihan }}</h5>
                  </div>
                  <p class="mb-1 text-warning" ><b>Rp. {{ $tagihan->nominal }}</b></p>
                  <small class="badge bg-warning rounded">Menunggu Dibayar</small>
                  <form action="" method="post">
                    @csrf
                    <input type="text" name="tagihan" value="{{ $tagihan->tagihan }}" hidden>
                    <input type="text" name="bulan" value="{{ $tagihan->bulan }}" hidden>
                    <input type="text" name="tahun" value="{{ $tagihan->tahun }}" hidden>
                    <input type="text" name="nominal" value="{{ $tagihan->nominal }}" hidden>
                    <div class="text-center mt-2">
                      <a href="/waiting-payment/{{ $tagihan->order_id }}" class="btn btn-gradient-success">Lanjutkan Pembayaran</a>
                    </div>
                  </form>
                </div>
                @else
                <div class="list-group-item">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $tagihan->tagihan }}</h5>
                  </div>
                  <p class="mb-1 text-danger" ><b>Rp. {{ $tagihan->nominal }}</b></p>
                    <small class="badge bg-danger rounded">Belum Lunas</small>
                  <form action="" method="post">
                    @csrf
                    <input type="text" name="tagihan" value="{{ $tagihan->tagihan }}" hidden>
                    <input type="text" name="bulan" value="{{ $tagihan->bulan }}" hidden>
                    <input type="text" name="tahun" value="{{ $tagihan->tahun }}" hidden>
                    <input type="text" name="nominal" value="{{ $tagihan->nominal }}" hidden>
                    <div class="text-center mt-2">
                      <button type="submit" class=" form-control btn btn-gradient-success">Bayar</button>
                    </div>
                  </form>
                </div>
                @endif
                
            @endforeach
          </div>
            <div class="accordion" id="accordionPanelsStayOpenExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Tagihan Lainya
                  </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                  <div class="accordion-body">
                    <div class="list-group">
                      @foreach($dataTagihan2 as $tagihan2)
                      @if ($tagihan2->bulan != $waktu->isoFormat('MMMM') && $tagihan2->tahun == $tahun)
                      @if ($tagihan2->keterangan == 'pending')
                      <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">{{ $tagihan2->tagihan }}</h5>
                        </div>
                        <p class="mb-1 text-warning" ><b>Rp. {{ $tagihan2->nominal }}</b></p>
                        <small class="badge bg-warning rounded">Menunggu Dibayar</small>
                        <form action="" method="post">
                          @csrf
                          <input type="text" name="tagihan" value="{{ $tagihan2->tagihan }}" hidden>
                          <input type="text" name="bulan" value="{{ $tagihan2->bulan }}" hidden>
                          <input type="text" name="tahun" value="{{ $tagihan2->tahun }}" hidden>
                          <input type="text" name="nominal" value="{{ $tagihan2->nominal }}" hidden>
                          <div class="text-center mt-2">
                            <a href="/waiting-payment/{{ $tagihan2->order_id }}" class="btn btn-gradient-success">Lanjutkan Pembayaran</a>
                          </div>
                        </form>
                      </div>
                      @else
                      <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">{{ $tagihan2->tagihan }}</h5>
                        </div>
                        <p class="mb-1 text-danger" ><b>Rp. {{ $tagihan2->nominal }}</b></p>
                          <small class="badge bg-danger rounded">Belum Lunas</small>
                        <form action="" method="post">
                          @csrf
                          <input type="text" name="tagihan" value="{{ $tagihan2->tagihan }}" hidden>
                          <input type="text" name="bulan" value="{{ $tagihan2->bulan }}" hidden>
                          <input type="text" name="tahun" value="{{ $tagihan2->tahun }}" hidden>
                          <input type="text" name="nominal" value="{{ $tagihan2->nominal }}" hidden>
                          <div class="text-center mt-2">
                            <button type="submit" class=" form-control btn btn-gradient-success">Bayar</button>
                          </div>
                        </form>
                      </div>
                      @endif
                      @endif
                      @endforeach     
                  </div>
                </div>
              </div>
                </div>
        </div>
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
   