<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="/dashboard-pengurus">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <!-- @if (auth()->user()->level == "pengurus")
  <li class="nav-item">
    <a class="nav-link collapsed" href="/data-santri">
      <i class="bi-solid bi-book"></i><span>Data Santri</span> 
    </a>
  </li>
  @endif -->

  @if (auth()->user()->level == "pengurus")
  <li class="nav-item">
    <a class="nav-link collapsed" href="/data-pembayaran">
      <i class="bi-solid bi-wallet"></i><span>Data Pembayaran</span>
    </a>
  </li>
  @endif

  @if (auth()->user()->level == "pendidik")
  <li class="nav-item">
    <a class="nav-link collapsed" href="/data-nilai">
      <i class="bi bi-journal-text"></i><span>Nilai Santri</span>
    </a>
  </li><!-- End Forms Nav -->
  @endif

  @if (auth()->user()->level == "pengurus")
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Jadwal Kegiatan</span>
    </a>
  </li>
  @endif

  @if (auth()->user()->level == "pengurus")
  <li class="nav-item">
    <a class="nav-link collapsed" href="/data-hafalan">
      <i class="bi bi-menu-button-wide"></i><span>Data Hafalan</span>
    </a>
  </li>
  @endif

  @if (auth()->user()->level == "pengurus")
  <li class="nav-item">
    <a class="nav-link collapsed" href="/data-informasi">
      <i class="fas fa-bullhorn"></i><span>Informasi Pribadi</span>
    </a>
  </li>
  @endif

  <!-- @if (auth()->user()->level == "pengurus")
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
      <i class="fas fa-bullhorn"></i><span>Pengumuman</span> 
    </a>
  </li>
  @endif -->

  <li class="nav-heading">Fitur Lainnya</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="akun-saya">
      <i class="bi bi-person"></i>
      <span>Profil</span>
    </a>
  </li><!-- End Profile Page Nav -->
  
</ul>

</aside><!-- End Sidebar-->