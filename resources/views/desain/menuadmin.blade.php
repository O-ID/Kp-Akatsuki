<ul class="nav">
    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
          <i class="material-icons">dashboard</i>
          <p>Beranda</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('daftar') ? 'active' : '' }}">
        <a class="nav-link" href="/daftar">
          <i class="material-icons">playlist_add</i>
          <p>Pendaftaran</p>
        </a>
    </li>
    <li class="nav-item {{ request()->is('validasi') ? 'active' : '' }}">
        <a class="nav-link" href="/validasi">
          <i class="material-icons">playlist_add_check</i>
          <p>Validasi</p>
        </a>
    </li>
</ul>

