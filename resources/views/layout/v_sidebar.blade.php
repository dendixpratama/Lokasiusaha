<ul class="nav">
  <li class="nav-item @yield('mndashboard')">
    <a class="nav-link" href="/dashboard_admin">
      <i class="mdi mdi-home menu-icon"></i>
      <span class="menu-title">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
      <i class="mdi mdi-circle-outline menu-icon"></i>
      <span class="menu-title">Master</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="/admins">Admin</a></li>
        <li class="nav-item"> <a class="nav-link" href="/users">User</a></li>
        <li class="nav-item"> <a class="nav-link" href="/lokasis">Lokasi</a></li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#perhitungan" aria-expanded="false" aria-controls="perhitungan">
      <i class="mdi mdi-account menu-icon"></i>
      <span class="menu-title">Perhitungan</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="perhitungan">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="/penilaians"> Penilaian </a></li>
        <li class="nav-item"> <a class="nav-link" href="/analisacpi"> CPI </a></li>
        <li class="nav-item"> <a class="nav-link" href="/hasils"> Hasil</a></li>
      </ul>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
      <i class="mdi mdi-account menu-icon"></i>
      <span class="menu-title">Autentikasi</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="auth">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal"> Logout </a></li>
      </ul>
    </div>
  </li>
</ul>