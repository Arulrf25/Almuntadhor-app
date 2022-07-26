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
        </span> Riwayat Pembayaran
      </h3>
    </div>
    <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col mb-3">
              <!-- Button trigger modal -->
              <a href="{{route('riwayat-pembayaran.cetak_all_user')}}" class="btn btn-sm btn-primary mb-2"> <i class="fas fa-download"></i> Download Semua Riwayat Pembayaran (pdf)</a>
              <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#DownloadData">
               <i class="fas fa-download"></i> Download Riwayat Perbulan
             </button>
             <button type="button" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#DownloadDataPelajaran">
              <i class="fas fa-download"></i> Download Rekap Pertahun
            </button>
           </div>
          </div>

          <small>Lihat Riwayat berdasarkan :</small>
           <form action="{{route('riwayat-pembayaran.cari_data_riwayat')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
          <div class="input-group mb-3">
            <div class="form-outline" style="margin-right: 5px; margin-top: 5px">
               
              <select name="bulan" class="form-select" aria-label="Default select example">
                <option selected>Pilih bulan</option>
              @php
              $bulan=array("januari","februari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember");
              $jlh_bln=count($bulan);
              for($c=0; $c<$jlh_bln; $c+=1){
                  echo"<option value=$bulan[$c]> $bulan[$c] </option>";
              }
              @endphp
                
                </select>
            </div>
            <div class="form-outline" style="margin-top: 5px">
              <select name="tahun" id="" class="form-select" required>
                <option notselected>Pilih tahun..</option>
                @for ($i=date('Y'); $i>=date('Y')-32; $i-=1)
                            <option value='{{$i}}'> {{$i}} </option>
                        @endfor
              </select>
              
            </div>
            <button type="submit" class="btn btn-sm btn-primary" style="margin-top: 5px">Tampilkan</button>
          </div>
            </form>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <th scope="col">NO</th>
                <th scope="col">TAGIHAN</th>
                <th scope="col">NOMINAL</th>
                <th scope="col">METHODE</th>
                <th scope="col">WAKTU BAYAR</th>
                <th scope="col">KET</th>
                <th scope="col">KWITANSI</th>
              </thead>
              @if ($riwayatPembayaran->isNotEmpty())
              @foreach($riwayatPembayaran as $santri)
              <tbody>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $santri->tagihan }}</td>
                <td>RP. {{ number_format($santri->gross_amount) }}</td>
                @if ($santri->payment_type == 'echannel')
                  <td class="text-uppercase">Bank Mandiri</td>
                @endif
                @if ($santri->payment_type == 'cstore')
                  <td class="text-uppercase">Indomaret/Alfamart</td>
                @endif
                @if ($santri->payment_type == 'bank_transfer')
                <td class="text-uppercase">{{ $santri->bank }}</td>
              @endif
              <td>{{ $santri->updated_at }}</td>
                <td><span class="badge badge-success">Lunas</span></td>
                <td><a href="/cetak-kwitansi/{{ $santri->id }}" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download</a></td>
              </tbody>
              @endforeach
              @else
              @foreach($riwayatPembayaran1 as $santri1)
              <tbody>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $santri1->tagihan }} {{ $santri1->bulan }} {{ $santri1->tahun }}</td>
                <td>{{ $santri1->gross_amount }}</td>
                <td>{{ $santri1->payment_type }}</td>
                <td>{{ $santri1->updated_at }}</td>
                <td><span class="badge badge-success">Lunas</span></td>
                <td><a href="/cetak-kwitansi/{{ $santri1->id }}" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download</a></td>
              </tbody>
              @endforeach
              @endif  
            </table>
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
  

<!-- Modal Download Perbulan-->
<div class="modal fade" id="DownloadData" tabindex="-1" aria-labelledby="DownloadDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DownloadDataLabel">Riwayat Perbulan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- Form tambah hafalan  --}}
        <form action="{{route('riwayat-pembayaran.cetak_perbulan_user')}}" method="GET">
          {{-- CSRF merupakan keamanan yang disediakan laravel  --}}
          <div class="mb-3">
            <label for="" class="form-label">Bulan</label>
            <select name="bulan" class="form-select" aria-label="Default select example">
              <option selected>Pilih bulan</option>
            @php
            $bulan=array("januari","februari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember");
            $jlh_bln=count($bulan);
            for($c=0; $c<$jlh_bln; $c+=1){
                echo"<option value=$bulan[$c]> $bulan[$c] </option>";
            }
            @endphp
              
              </select>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Tahun</label>
            <select name="tahun" id="" class="form-select" required>
              <option notselected>Pilih tahun..</option>
              @for ($i=date('Y'); $i>=date('Y')-32; $i-=1)
                          <option value='{{$i}}'> {{$i}} </option>
                      @endfor
            </select>
          </div>
          
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Download</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Download Pertahun-->
<div class="modal fade" id="DownloadDataPelajaran" tabindex="-1" aria-labelledby="DownloadDataPelajaranLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DownloadDataPelajaranLabel">Riwayat Pertahun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- Form tambah hafalan  --}}
        <form action="{{route('riwayat-pembayaran.cetak_pertahun_user')}}" method="GET">
          {{-- CSRF merupakan keamanan yang disediakan laravel  --}}

            <div class="mb-3">
              <label for="" class="form-label">Tahun</label>
              <select name="tahun" id="" class="form-select" required>
                <option notselected>Pilih tahun..</option>
                @for ($i=date('Y'); $i>=date('Y')-32; $i-=1)
                            <option value='{{$i}}'> {{$i}} </option>
                        @endfor
              </select>
            </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Download</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
        </div>
      </div>
   