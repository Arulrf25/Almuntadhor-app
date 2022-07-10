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
        </span> Hafalan Santri
      </h3>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-header">Hafalan Santri</div>
            <div class="tabel table-responsive" style="margin-top: 20px">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Hafalan</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                
                @foreach($riwayatHafalan as $santri)
                <tbody>
                    <tr>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $santri->hafalan }}</td>
                        <td>-</td>
                        <td class="bg-success text-white">{{ $santri->keterangan }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        </div>
    </div>
  </div>
          <!-- selesai content -->
          <!-- Footer -->
          @include('partials.footer')
  


        </div>
      </div>
   