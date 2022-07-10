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
        </span> Rekap Nilai
      </h3>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table table-responsive">
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Mata Pelajaran</th>
                        <th class="text-center">Kehadiran</th>
                        <th class="text-center">Tugas</th>
                        <th class="text-center">UTS</th>
                        <th class="text-center">UAS</th>
                        <th class="text-center">Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tampilUser as $show)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{{ $show->pelajaran }}</td>
                        <td class="text-center">{{ $show->kehadiran }}</td>
                        <td class="text-center">{{ $show->tugas }}</td>
                        <td class="text-center">{{ $show->uts }}</td>
                        <td class="text-center">{{ $show->uas }}</td>
                        <td class="text-center">
                          @php
                              $nilai_akhir = ($show->kehadiran +  $show->tugas +  $show->uts +  $show->uas) / 4
                          @endphp
                          {{$nilai_akhir}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
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
   