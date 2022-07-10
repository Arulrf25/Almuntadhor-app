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
                <td>{{ $santri->tagihan }} {{ $santri->bulan }} {{ $santri->tahun }}</td>
                <td>{{ $santri->gross_amount }}</td>
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
                <td><a  href="/cetak-kwitansi/{{ $santri->order_id }}" class="btn  btn-sm  btn-success"><i class="fas fa-download"></i> Download</a></td>
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
                <td><a href="/cetak-kwitansi/{{ $santri1->order_id }}" class="btn btn-sm btn-success"><i class="fas fa-download"></i> Download</a></td>
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
  


        </div>
      </div>
   