@include('admin.layouts.head')
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('admin.layouts.sidebar')
        <div class="layout-page">
          @include('admin.layouts.navbar')
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                  <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                          <span class="d-none d-sm-block">Upload Foto Baru</span>
                          <i class="bx bx-upload d-block d-sm-none"></i>
                          <input type="file" name="foto" id="foto" class="account-file-input" hidden accept="image/png, image/jpeg"/>
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                          <i class="bx bx-reset d-block d-sm-none"></i>
                          <span class="d-none d-sm-block">Reset</span>
                        </button>
                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                      </div>
                    </div>
                  </form>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                  <form id="formAccountSettings" action="{{ route('update-admin', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" id="firstName" name="name" value="{{auth()->user()->name}}" autofocus/>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" id="username" value="{{auth()->user()->username}}" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="text" id="email" name="email" value="{{auth()->user()->email}}"/>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Level</label>
                        <input class="form-control" type="text" id="level" value="{{auth()->user()->level}}" readonly/>
                      </div>
                    </div>
                    <div class="mt-2">
                      <button type="submit" class="btn btn-primary me-2">Update</button>
                      <button type="reset" class="btn btn-outline-secondary">Batal</button>
                    </div>
                  </form>
                </div>
              </div>

              @if(Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ Session::get('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif
              @if(Session::get('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ Session::get('failed') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              <div class="card">
                <h5 class="card-header">Ubah Password</h5>
                <div class="card-body">
                  <form action="{{ route('update-password', $user->id)}}" method="POST">
                    @method('PUT')  
                    @csrf
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="password_lama">Password Lama</label>
                        <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Masukan Password Lama">
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="password_baru">Password Baru</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukan Password Baru">
                        @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="password_baru">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Masukan Password Baru">
                      </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary deactivate-account">Ubah Password</button>
                  </form>
              </div>
            </div>
          </div>
          @include('admin.layouts.foot')
        </div>
    </div>
</div>