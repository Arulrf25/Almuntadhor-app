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
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kegiatan</th>
                          <th>Waktu</th>
                          <th>Tempat</th>
                      </tr>
                    </thead>
                    @foreach($ahad as $jadwal)
                    <tbody>
                      <tr>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $jadwal->kegiatan }}</td>
                          <td>{{ $jadwal->waktu }}</td>
                          <td>{{ $jadwal->tempat }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="card-header">Jadwal Kegiatan Hari Senin</div>
                <div class="tabel table-responsive" style="margin-top: 20px">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kegiatan</th>
                          <th>Waktu</th>
                          <th>Tempat</th>
                      </tr>
                    </thead>
                    @foreach($senin as $jadwal)
                    <tbody>
                      <tr>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $jadwal->kegiatan }}</td>
                          <td>{{ $jadwal->waktu }}</td>
                          <td>{{ $jadwal->tempat }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="card-header">Jadwal Kegiatan Hari Selasa</div>
                <div class="tabel table-responsive" style="margin-top: 20px">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kegiatan</th>
                          <th>Waktu</th>
                          <th>Tempat</th>
                      </tr>
                    </thead>
                    @foreach($selasa as $jadwal)
                    <tbody>
                      <tr>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $jadwal->kegiatan }}</td>
                          <td>{{ $jadwal->waktu }}</td>
                          <td>{{ $jadwal->tempat }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="card-header">Jadwal Kegiatan Hari Rabu</div>
                <div class="tabel table-responsive" style="margin-top: 20px">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kegiatan</th>
                          <th>Waktu</th>
                          <th>Tempat</th>
                      </tr>
                    </thead>
                    @foreach($rabu as $jadwal)
                    <tbody>
                      <tr>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $jadwal->kegiatan }}</td>
                          <td>{{ $jadwal->waktu }}</td>
                          <td>{{ $jadwal->tempat }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="card-header">Jadwal Kegiatan Hari Kamis</div>
                <div class="tabel table-responsive" style="margin-top: 20px">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kegiatan</th>
                          <th>Waktu</th>
                          <th>Tempat</th>
                      </tr>
                    </thead>
                    @foreach($kamis as $jadwal)
                    <tbody>
                      <tr>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $jadwal->kegiatan }}</td>
                          <td>{{ $jadwal->waktu }}</td>
                          <td>{{ $jadwal->tempat }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="card-header">Jadwal Kegiatan Hari Jum'at</div>
                <div class="tabel table-responsive" style="margin-top: 20px">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kegiatan</th>
                          <th>Waktu</th>
                          <th>Tempat</th>
                      </tr>
                    </thead>
                    @foreach($jumat as $jadwal)
                    <tbody>
                      <tr>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $jadwal->kegiatan }}</td>
                          <td>{{ $jadwal->waktu }}</td>
                          <td>{{ $jadwal->tempat }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <div class="card-header">Jadwal Kegiatan Hari Sabtu</div>
                <div class="tabel table-responsive" style="margin-top: 20px">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kegiatan</th>
                          <th>Waktu</th>
                          <th>Tempat</th>
                      </tr>
                    </thead>
                    @foreach($sabtu as $jadwal)
                    <tbody>
                      <tr>
                          <td>{{ $loop->index +1 }}</td>
                          <td>{{ $jadwal->kegiatan }}</td>
                          <td>{{ $jadwal->waktu }}</td>
                          <td>{{ $jadwal->tempat }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      @include('partials.footer')
    </div>
