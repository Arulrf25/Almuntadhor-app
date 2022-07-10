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
        </span> Jadwal Kegiatan
      </h3>
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
                         <p><small class="badge bg-danger">Telah selesai</small></p>
                       </div>
                       <div class="list-group-item list-group-item" aria-current="true" style="margin-bottom: 10px">
                         <div class="d-flex w-100 justify-content-between">
                           <h6 class="mb-1">Madrasah</h6>
                         </div>
                         <p class="mb-1">Pukul 13.30 - 15.30 WIB</p>
                         <p><small>Tempat : Kelas 2</small></p>
                         <p><small class="badge bg-success">Sedang berlansung</small></p>
                       </div>
                       <div class="list-group-item list-group-item" aria-current="true" style="margin-bottom: 10px">
                         <div class="d-flex w-100 justify-content-between">
                           <h6 class="mb-1">Pengajian Sore</h6>
                         </div>
                         <p class="mb-1">Pukul 16.00 - 17.30 WIB</p>
                         <p><small>Tempat : Mushola</small></p>
                         <p><small class="badge bg-warning">Akan datang</small></p>
                       </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-header" style="margin-bottom: 20px">Jadwal Kegiatan</div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#senin" aria-expanded="true" aria-controls="senin">
                                  Senin
                                </button>
                              </h2>
                              <div id="senin" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th>Kegiatan</th>
                                             <th>Waktu</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <td>Sekolah Formal</td>
                                             <td>07.00 - 13.00 WIB</td>
                                         </tr>
                                     </tbody>
                                 </table>
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#selasa" aria-expanded="false" aria-controls="selasa">
                                  Selasa
                                </button>
                              </h2>
                              <div id="selasa" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sekolah Formal</td>
                                                <td>07.00 - 13.00 WIB</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rabu" aria-expanded="false" aria-controls="rabu">
                                  Rabu
                                </button>
                              </h2>
                              <div id="rabu" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sekolah Formal</td>
                                                <td>07.00 - 13.00 WIB</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kamis" aria-expanded="false" aria-controls="selasa">
                                    Kamis
                                  </button>
                                </h2>
                                <div id="kamis" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sekolah Formal</td>
                                                <td>07.00 - 13.00 WIB</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#jumat" aria-expanded="false" aria-controls="selasa">
                                    Jumat
                                  </button>
                                </h2>
                                <div id="jumat" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sekolah Formal</td>
                                                <td>07.00 - 13.00 WIB</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sabtu" aria-expanded="false" aria-controls="selasa">
                                    Sabtu
                                  </button>
                                </h2>
                                <div id="sabtu" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sekolah Formal</td>
                                                <td>07.00 - 13.00 WIB</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                              <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ahad" aria-expanded="false" aria-controls="selasa">
                                    Ahad
                                  </button>
                                </h2>
                                <div id="ahad" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Kegiatan</th>
                                                <th>Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Sekolah Formal</td>
                                                <td>07.00 - 13.00 WIB</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
   