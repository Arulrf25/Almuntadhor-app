<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="{!! asset('sneat/img/icons/logo.png') !!}" width="30"  alt="">
      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2">AL MUNTADHOR</span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
      <li class="menu-item">
        <a href="/dashboard-admin" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Beranda</div>
        </a>
      </li>
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Menu Admin</span>
      </li>
      <li class="menu-item">
        <a href="/data-akun" class="menu-link">
          <div data-i18n="Account">Data Akun</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="/data-alumni" class="menu-link">
          <div data-i18n="Account">Data Alumni</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="/data-prestasi" class="menu-link">
          <div data-i18n="Account">Data Prestasi</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="/data-konten" class="menu-link">
          <div data-i18n="Account">Data Konten</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="/data-kegiatan" class="menu-link">
          <div data-i18n="Account">Jadwal Kegiatan</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('logout')}}" class="menu-link">
          <div data-i18n="Account">Keluar</div>
        </a>
      </li>
    </ul>
</aside>