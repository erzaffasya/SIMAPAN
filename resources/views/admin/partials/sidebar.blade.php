<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">

        <ul>
            <li>
                <a href="#"><img src="{{ asset('tadmin/assets/img/icons/dashboard.svg') }}" alt="img"><span>
                        Dashboard</span> </a>
            </li>
            @if (Auth::user()->role == 'edukasi' || Auth::user()->role == 'artikel' || Auth::user()->role == 'admin')
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
                        <li><a href="{{ route('simapan-artikel.index') }}"
                                class="{{ Request::routeIs('simapan-artikel.*') ? 'active' : '' }}">Artikel</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'forum' || Auth::user()->role == 'artikel' || Auth::user()->role == 'admin')
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
            @endif
            @if (Auth::user()->role == 'forum' || Auth::user()->role == 'admin')
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
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> KLUSTER </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('kluster.edit', 1) }}"
                                class="{{ Request::path() == 'admin/kluster/1/edit' ? 'active' : '' }}">Kluster 1</a>
                        </li>
                        <li><a href="{{ route('kluster.edit', 2) }}"
                                class="{{ Request::path() == 'admin/kluster/2/edit' ? 'active' : '' }}">Kluster 2</a>
                        </li>
                        <li><a href="{{ route('kluster.edit', 3) }}"
                                class="{{ Request::path() == 'admin/kluster/3/edit' ? 'active' : '' }}">Kluster 3</a>
                        </li>
                        <li><a href="{{ route('kluster.edit', 4) }}"
                                class="{{ Request::path() == 'admin/kluster/4/edit' ? 'active' : '' }}">Kluster 4</a>
                        </li>
                        <li><a href="{{ route('kluster.edit', 5) }}"
                                class="{{ Request::path() == 'admin/kluster/5/edit' ? 'active' : '' }}">Kluster 5</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Grafik </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('persentase-anak.index') }}"
                                class="{{ Request::routeIs('persentase-anak.*') ? 'active' : '' }}">Persentase Anak</a>
                        </li>
                        <li><a href="{{ route('layanan-pengasuh-anak.index') }}"
                                class="{{ Request::routeIs('layanan-pengasuh-anak.*') ? 'active' : '' }}">Layanan
                                Pengasuh
                                Anak</a>
                        </li>
                        <li><a href="{{ route('sekolah-ramah-anak.index') }}"
                                class="{{ Request::routeIs('sekolah-ramah-anak.*') ? 'active' : '' }}">Sekolah Ramah
                                Anak</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Dokumen </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('kebijakan.index') }}"
                                class="{{ Request::routeIs('kebijakan.*') ? 'active' : '' }}">Kebijakan</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'admin')
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> EMERGENCY </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('emergency.index') }}"
                                class="{{ Request::routeIs('emergency.*') ? 'active' : '' }}">Riwayat</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> USER </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('user.index') }}"
                                class="{{ Request::routeIs('user.*') ? 'active' : '' }}">User</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> SIGA </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('jenis-siga.index') }}"
                                class="{{ Request::routeIs('jenis-siga.*') ? 'active' : '' }}">Jenis SIGA</a>
                        </li>
                        <li><a href="{{ route('siga.index') }}"
                                class="{{ Request::routeIs('siga.*') ? 'active' : '' }}">SIGA</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><i data-feather="columns"></i> <span> Pemberdayaan Masyarakat </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('pemberdayaan-masyarakat.index') }}"
                                class="{{ Request::routeIs('pemberdayaan-masyarakat.*') ? 'active' : '' }}">Pemberdayaan Masyarakat</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>
