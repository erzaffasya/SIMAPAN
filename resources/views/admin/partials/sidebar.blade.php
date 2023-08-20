<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li>
                <a href="#"><img src="{{ asset('tadmin/assets/img/icons/dashboard.svg') }}" alt="img"><span>
                        Dashboard</span> </a>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> SIMAPAN </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('aspirasi.index') }}"
                            class="{{ Request::routeIs('aspirasi.*') ? 'active' : '' }}">Aspirasi </a></li>
                    <li><a href="{{ route('kantor.index') }}"
                            class="{{ Request::routeIs('kantor.*') ? 'active' : '' }}">Kantor </a></li>
                    <li><a href="{{ route('kegiatan.index') }}"
                            class="{{ Request::routeIs('kegiatan.*') ? 'active' : '' }}">Kegiatan </a></li>

                    {{-- <li><a href="{{ route('kategori-artikel.index') }}"
                            class="{{ Request::routeIs('kategori-artikel.*') ? 'active' : '' }}">Kategori Artikel</a>
                    </li>
                    <li><a href="{{ route('artikel.index') }}"
                            class="{{ Request::routeIs('artikel.*') ? 'active' : '' }}">Artikel</a>
                    </li> --}}
                    <li><a href="{{ route('tentang.index') }}"
                            class="{{ Request::routeIs('tentang.*') ? 'active' : '' }}">Tentang</a>
                    </li>
                    <li><a href="{{ route('fastlink.index') }}"
                            class="{{ Request::routeIs('fastlink.*') ? 'active' : '' }}">Fast Link</a>
                    </li>
                    <li><a href="{{ route('faq.index') }}"
                            class="{{ Request::routeIs('faq.*') ? 'active' : '' }}">FAQ</a>
                    </li>
                    <li><a href="{{ route('banner.index') }}"
                            class="{{ Request::routeIs('banner.*') ? 'active' : '' }}">Banner</a>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> FORUM </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('forum-struktur.index') }}"
                            class="{{ Request::routeIs('forum-struktur.*') ? 'active' : '' }}">Struktur</a>
                    </li>
                    <li><a href="{{ route('forum-pengurus.index') }}"
                            class="{{ Request::routeIs('forum-pengurus.*') ? 'active' : '' }}">Pengurus</a>
                    </li>
                    <li><a href="{{ route('forum-kategori-artikel.index') }}"
                            class="{{ Request::routeIs('forum-kategori-artikel.*') ? 'active' : '' }}">Kategori
                            Artikel</a>
                    </li>
                    <li><a href="{{ route('forum-artikel.index') }}"
                            class="{{ Request::routeIs('forum-artikel.*') ? 'active' : '' }}">Artikel</a>
                    </li>

                    <li><a href="{{ route('forum-kategori-galeri.index') }}"
                            class="{{ Request::routeIs('forum-kategori-galeri.*') ? 'active' : '' }}">Galeri</a>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> PROFIL </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('jumlahanak.index') }}"
                            class="{{ Request::routeIs('jumlahanak.*') ? 'active' : '' }}">Jumlah Anak</a>
                    </li>
                    <li><a href="{{ route('profil-kelembagaan.index') }}"
                            class="{{ Request::routeIs('profil-kelembagaan.*') ? 'active' : '' }}">Kelembagaan</a>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> EMERGENCY </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('emergency.index') }}"
                            class="{{ Request::routeIs('emergency.*') ? 'active' : '' }}">Riwayat</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
