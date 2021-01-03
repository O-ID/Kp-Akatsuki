<ul class="nav">
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
          <i class="material-icons">dashboard</i>
          <p>Beranda</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/struktur') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/struktur">
          <i class="material-icons">recent_actors</i>
          <p>Struktur</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('daftar') ? 'active' : '' }}">
        <a class="nav-link" href="/daftar">
          <i class="material-icons">person_add_alt_1</i>
          <p>Pendaftaran</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('validasi') ? 'active' : '' }}">
        <a class="nav-link" href="/validasi">
          <i class="material-icons">how_to_reg</i>
          <p>Validasi</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('manajemen') ? 'active' : '' }}">
        <a class="nav-link" href="/manajemen">
          <i class="material-icons">settings_system_daydream</i>
          <p>Manajemen</p>
        </a>
    </li>
</ul>

