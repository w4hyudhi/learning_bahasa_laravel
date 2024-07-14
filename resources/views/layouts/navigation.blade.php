<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('spells.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        {{ __('Mengeja') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category_image.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-image"></i>
                    <p>
                        {{ __('Tebak Gambar') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category_video.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-video"></i>
                    <p>
                        {{ __('Video') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('quiz_categories.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-question"></i>
                    <p>
                        {{ __('Quiz') }}
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('elector.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        {{ __('Pemilih') }}
                    </p>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="{{ route('tps.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-map-marker-alt"></i>
                    <p>
                        {{ __('TPS') }}
                    </p>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="{{ route('distrik.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-map-marked-alt"></i>
                    <p>
                        {{ __('Distrik') }}
                    </p>
                </a>
            </li> --}}

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Laporan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
