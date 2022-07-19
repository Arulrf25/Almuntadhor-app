@include('admin.layouts.head')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('admin.layouts.sidebar')
        <div class="layout-page">
            @include('admin.layouts.navbar')
            <div class="content-wrapper">
            

                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">Pengaturan Dasar</div>
                            @foreach ($setting as $s)
                            <form method="POST" action="{{route('setting-aplikasi.update', $s->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                            <label for="nama_aplikasi">Nama Aplikasi</label>
                            <input type="text" name="nama_aplikasi" class="form-control mb-3" value="{{$s->nama_aplikasi}}">
                            <label for="nama_pesantren">Nama Pesantren</label>
                            <input type="text" name="nama_pesantren"  class="form-control mb-3" value="{{$s->nama_pesantren}}">
                            <label for="alamat" >Alamat Pesantren</label>
                            <textarea name="alamat" class="form-control mb-3" value="">{{$s->alamat}}</textarea>
                            <label for="telp" >Telp  Pesantren</label>
                            <input type="text" name="telp" class="form-control mb-3" value="{{$s->telp}}">
                            <label for="website" >Website</label>
                            <input type="text" name="website" class="form-control mb-3" value="{{$s->website}}">
                            <label for="pengasuh">Pengasuh</label>
                            <input type="text" name="pengasuh" class="form-control mb-3" value="{{$s->pengasuh}}">
                            <label for="izin" >Izin Pesantren</label>
                            <input type="text" name="izin" class="form-control mb-3" value="{{$s->izin}}">

                            <label for="logo_aplikasi" >Logo Aplikasi</label>
                            <p><img src="{{ asset('/content/'. $s->logo_aplikasi) }}" alt="" width="40%"></p>
                            <input type="text" name="logo_old" class="form-control mb-3" value="{{$s->logo_aplikasi}}" hidden>
                            <input type="file" name="logo_aplikasi" class="form-control mb-3">
                            @endforeach
                            <div class="text-center">
                                
                                <button type="submit" class="btn btn-primary">Update Pengaturan</button>
                            </div>
                            </form>


                       <div class="card-header mt-4"><h6>SLIDE BANNER DASHBOARD</h6></div>
                       @foreach ($banner as $b)
                        <div class="row">
                            <label for="slide1">Slide {{$loop->index + 1}}</label>
                           <p> <img src="{{ asset('/content/'. $b->gambar) }}" alt="" width="30%"></p>
                        <div class="col">
                            <form method="POST" action="{{route('setting-aplikasi.banner', $b->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                            <input type="text" name="old_image" class="form-control" value="{{$b->gambar}}" hidden>
                            <input type="text" name="judul" class="form-control" value="{{$b->judul}}" hidden>
                            <input type="text" name="kategori" class="form-control" value="{{$b->kategori}}" hidden>
                            <input type="text" name="deskripsi" class="form-control" value="{{$b->deskripsi}}" hidden>
                            <input name="gambar" id="gambar" type="file" class="form-control">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-3">Update Slide {{$loop->index + 1}}</button>
                        </form>
                        </div>
                        </div>
                        @endforeach
                       </div>
                    </div>
                </div>
                </div>
                @include('admin.layouts.foot')
            </div>
        </div>
    </div>
</div>
        