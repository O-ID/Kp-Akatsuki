<ul class="nav">
    <li class="nav-item {{ request()->is('/') || request()->is('daftar') ? 'active' : '' }}">
      <a class="nav-link" href="/">
        <i class="material-icons">dashboard</i>
        <p>Beranda</p>
      </a>
    </li>
    <li class="nav-item {{ request()->is('typo') || request()->is('denah') || request()->is('struktur') ? 'active' : '' }}" data-toggle="collapse" href="#pagesExamples">
      <a class="nav-link" href="JavaScript:void(0);">
        <i class="material-icons">account_balance</i>
        <p>Sekolah<b class="caret"></b></p>
      </a>
      <div class="collapse" id="pagesExamples">
          <ul class="nav">
              <li class="nav-item {{ request()->is('denah') ? 'active' : '' }}">
                  <a class="nav-link" href="/denah">
                    <i class="material-icons">location_ons</i>
                    <p>Denah Seskolah</p>
                  </a>
              </li>
              <li class="nav-item {{ request()->is('struktur') ? 'active' : '' }}">
                  <a class="nav-link" href="/struktur">
                    <i class="material-icons">library_books</i>
                    <p>Struktur Sekolah</p>
                  </a>
              </li>
          </ul>
        </div>
    </li>
    <li class="nav-item {{ request()->is('kelulusan') ? 'active' : '' }}">
      <a class="nav-link" href="/kelulusan">
        <i class="material-icons">content_paste</i>
        <p>Daftar Kelulusan</p>
      </a>
    </li>
</ul>
