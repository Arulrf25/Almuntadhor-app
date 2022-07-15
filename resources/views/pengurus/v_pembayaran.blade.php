@extends('pengurus.main')
  @section('pengurus')
    @include('pengurus.navbar')
    @include('pengurus.sidebar')

    <main id="main" class="main">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Data Pembayaran</h1>
            </div>
          </div>
        </div>
      </section>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('data-pembayaran.store')}}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="mb-3">
                  <label for="" class="form-label">NIS Santri</label>
                  <input required name="nis" type="text" class="form-control" placeholder="Masukkan NIS Santri">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Nama Lengkap Santri</label>
                  <input required name="nama" type="text" class="form-control" placeholder="Masukkan Nama Lengkap Santri">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tagihan Pembayaran</label>
                    <select name="tagihan" class="form-select" aria-label="Default select example">
                    <option selected>Pilih tagihan SPP</option>
                    <option value="SPP Januari">SPP Januari</option>
                    <option value="SPP Februari">SPP Februari</option>
                    <option value="SPP Maret">SPP Maret</option>
                    <option value="SPP April">SPP April</option>
                    <option value="SPP Mei">SPP Mei</option>
                    <option value="SPP Juni">SPP Juni</option>
                    <option value="SPP Juli">SPP Juli</option>
                    <option value="SPP Agustus">SPP Agustus</option>
                    <option value="SPP September">SPP September</option>
                    <option value="SPP Oktober">SPP Oktober</option>
                    <option value="SPP November">SPP November</option>
                    <option value="Daftar Ulang dan Syahriyyah">Daftar Ulang dan Syahriyyah</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Nominal Pembayaran</label>
                  <select name="nominal" class="form-select" aria-label="Default select example">
                  <option selected>Pilih nominal pembayaran</option>
                  <option value="Rp. 350.000">Rp. 350.000</option>
                  <option value="Rp. 750.000">Rp. 750.000</option>
                  </select>
                  <!-- <input required name="nominal" type="text" value="Rp. 350.000-," class="form-control" readonly> -->
                </div>
                <div class="mb-3">
                  <label hidden for="" class="form-label">Bukti Pembayaran</label>
                  <input hidden required name="bukti" id="bukti" type="text" class="form-control" value="Pembayaran Langsung" readonly>
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Keterangan</label>
                  <input required name="keterangan" type="text" class="form-control" placeholder="Masukkan keterangan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          @if(session('success'))
          <div class="alert alert-success">
            <b>Berhasil!</b> {{session('success')}}
          </div> 
          @elseif(session('error'))
          <div class="alert alert-danger">
            <b>Maaf!</b> {{session('error')}}
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row" style="margin-left: 10px; margin-top:20px">
                <div class="col mb-3">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i> Tambah Data
                  </button>
                  <a href="{{ route('data-pembayaran.cetak-form') }}" class="btn btn-primary">
                    <i class="fas fa-print"></i> Cetak Data
                  </a>
                </div>
              </div>
              <div class="row mb-3">
                <label for="cari" class="col-form-label">Cari Data:</label>
                <form class="d-flex" method="POST" action="{{route('search')}}">
                    @csrf
                    <div class="col-sm-5">
                      <input class="form-control" name="keyword" type="search" placeholder="Cari berdasarkan tanggal" aria-label="Search">
                    </div>
                    <div class="col">
                      <span class="form-text">
                        <button type="submit" class="btn btn-sm btn-primary">Cari</button>
                      </span>
                    </div>
                </form>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover" style="vertical-align: middle">
                  <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama Santri</th>
                    <th>Tagihan</th>
                    <th>Nominal</th>
                    <th>Bukti Pembayaran</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                  @foreach($colleges as $college)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $college->nis }}</td>
                    <td>{{ $college->nama }}</td>
                    <td>{{ $college->tagihan }}</td>
                    <td>{{ $college->nominal }}</td>
                    <td>{{ $college->bukti }}</td>
                    <td>{{ $college->keterangan }}</td>
                    <td>
                      <form action="{{route('data-pembayaran.destroy', $college->id)}}" method="POST">
                        <a href="{{ asset('/img/'. $college->bukti) }}" 
                            class="btn btn-warning fas fa-eye"></a>
                        <a href="{{route('data-pembayaran.edit', $college->id)}}" 
                            class="btn btn-primary fas fa-edit"></a>
                        @csrf    
                        @method('delete')
                        <button type="submit" class="btn btn-danger fas fa-trash-alt"></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    @include('pengurus.footer')
  @endsection