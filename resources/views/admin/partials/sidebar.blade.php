<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li>
                <a href="index.html"><img src="{{ asset('tadmin/assets/img/icons/dashboard.svg') }}" alt="img"><span>
                        Dashboard</span> </a>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><img src="{{ asset('tadmin/assets/img/icons/product.svg') }}"
                        alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
                <ul>
                    <li><a href="productlist.html">Product List</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> SIMAPAN </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('kantor.index') }}"
                            class="{{ Request::routeIs('kantor.*') ? 'active' : '' }}">Kantor </a></li>
                    <li><a href="{{ route('kegiatan.index') }}"
                            class="{{ Request::routeIs('kegiatan.*') ? 'active' : '' }}">Kegiatan </a></li>

                    <li><a href="{{ route('kategori-artikel.index') }}"
                            class="{{ Request::routeIs('kategori-artikel.*') ? 'active' : '' }}">Kategori Artikel</a>
                    </li>
                    <li><a href="{{ route('artikel.index') }}"
                            class="{{ Request::routeIs('artikel.*') ? 'active' : '' }}">Artikel</a>
                    </li>
                    <li><a href="{{ route('tentang.index') }}"
                            class="{{ Request::routeIs('tentang.*') ? 'active' : '' }}">Tentang</a>
                    </li>
                    <li><a href="{{ route('fastlink.index') }}"
                            class="{{ Request::routeIs('fastlink.*') ? 'active' : '' }}">Fast Link</a>
                    </li>
                    <li><a href="{{ route('jumlahanak.index') }}"
                            class="{{ Request::routeIs('jumlahanak.*') ? 'active' : '' }}">Jumlah Anak</a>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> FORUM </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('forum-pengurus.index') }}"
                            class="{{ Request::routeIs('forum-pengurus.*') ? 'active' : '' }}">Pengurus</a>
                    </li>
                    <li><a href="{{ route('forum-kategori-artikel.index') }}"
                            class="{{ Request::routeIs('forum-kategori-artikel.*') ? 'active' : '' }}">Kategori
                            Artikel</a>
                    </li>
                    <li><a href="{{ route('forum-kategori-galeri.index') }}"
                            class="{{ Request::routeIs('forum-kategori-galeri.*') ? 'active' : '' }}">Kategori
                            Galeri</a>
                    </li>
                    <li><a href="{{ route('forum-artikel.index') }}"
                            class="{{ Request::routeIs('forum-artikel.*') ? 'active' : '' }}">Artikel</a>
                    </li>
                    <li><a href="{{ route('forum-galeri.index') }}"
                            class="{{ Request::routeIs('forum-galeri.*') ? 'active' : '' }}">Galeri</a>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="javascript:void(0);"><i data-feather="columns"></i> <span> PROFIL </span> <span
                        class="menu-arrow"></span></a>
                <ul>
                    <li><a href="{{ route('profil-kategori-galeri.index') }}"
                            class="{{ Request::routeIs('profil-kategori-galeri.*') ? 'active' : '' }}">Kategori
                            Galeri</a>
                    </li>
                    <li><a href="{{ route('profil-galeri.index') }}"
                            class="{{ Request::routeIs('profil-galeri.*') ? 'active' : '' }}">Galeri</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
