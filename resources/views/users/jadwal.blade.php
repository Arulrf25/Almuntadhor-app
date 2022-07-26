@extends('layouts.main')
  @section('container')
    @include('partials.navbar')
    @include('partials.sidebar')

    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
              <a href="{{ URL::previous() }}" style="color:white"><i class="fas fa-arrow-circle-left"></i></a>
            </span> Jadwal Kegiatan
          </h3>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="card-header">Jadwal Kegiatan Hari Ahad</div>
                <div class="tabel table-responsive" style="margin-top: 20px">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                          <th>Hari</th>
                          <th>Kegiatan</th>
                          <th>Waktu</th>
                          <th>Tempat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td rowspan="{{$ahad->count()}}">Ahad</td>
                      @foreach ($ahad as $ahad)
                          <td>{{$ahad->kegiatan}}</td>
                          <td>{{$ahad->mulai}}-{{$ahad->selesai}}</td>
                          <td>{{$ahad->tempat}}</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td rowspan="{{$senin->count()}}">Senin</td>
                      @foreach ($senin as $senin)
                        <td>{{$senin->kegiatan}}</td>
                        <td>{{$senin->mulai}}-{{$senin->selesai}}</td>
                        <td>{{$senin->tempat}}</td>
                    </tr>
                      @endforeach
                       <tr>
                        <td rowspan="{{$selasa->count()}}">Selasa</td>
                      @foreach ($selasa as $selasa)
                        <td>{{$selasa->kegiatan}}</td>
                        <td>{{$selasa->mulai}}-{{$selasa->selesai}}</td>
                        <td>{{$selasa->tempat}}</td>
                    </tr>
                      @endforeach
                     <tr>
                        <td rowspan="{{$rabu->count()}}">Rabu</td>
                      @foreach ($rabu as $rabu)
                        <td>{{$rabu->kegiatan}}</td>
                        <td>{{$rabu->mulai}}-{{$rabu->selesai}}</td>
                        <td>{{$rabu->tempat}}</td>
                    </tr>
                      @endforeach
                       <tr>
                        <td rowspan="{{$kamis->count()}}">Kamis</td>
                      @foreach ($kamis as $kamis)
                        <td>{{$kamis->kegiatan}}</td>
                        <td>{{$kamis->mulai}}-{{$kamis->selesai}}</td>
                        <td>{{$kamis->tempat}}</td>
                    </tr>
                      @endforeach
                      <tr>
                        <td rowspan="{{$jumat->count()}}">Jumat</td>
                      @foreach ($jumat as $jumat)
                        <td>{{$jumat->kegiatan}}</td>
                        <td>{{$jumat->mulai}}-{{$jumat->selesai}}</td>
                        <td>{{$jumat->tempat}}</td>
                    </tr>
                      @endforeach
                      <tr>
                        <td rowspan="{{$sabtu->count()}}">Sabtu</td>
                      @foreach ($sabtu as $sabtu)
                        <td>{{$sabtu->kegiatan}}</td>
                        <td>{{$sabtu->mulai}}-{{$sabtu->selesai}}</td>
                        <td>{{$sabtu->tempat}}</td>
                    </tr>
                      @endforeach
                    
                    </tbody>
                    {{-- @endforeach --}}
                  </table>
                </div>
            </div>
          </div>
        </div>
        
      </div>
      @include('partials.footer')
    </div>
