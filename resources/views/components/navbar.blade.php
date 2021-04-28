        
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                            @php
                                $role = Auth::user()->role;
                            @endphp
                            @if ($role == 'admin')
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                    <img src="{{ Auth::user()->admins->gambar ?? 'https://apollo-singapore.akamaized.net/v1/files/dx2fwvdn0exy1-ID/image;s=272x0' }}" class="avatar img-fluid rounded mr-1" alt="{{ Auth::user()->admins->nama ?? Auth::user()->name }}" /> <span class="text-dark">{{ Auth::user()->admins->nama ?? Auth::user()->name }}</span>
                                </a>
                            @elseif($role == 'siswa')
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                    <img src="{{ asset('img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded mr-1" alt="{{ Auth::user()->students->nama ?? Auth::user()->name }}" /> <span class="text-dark">{{ Auth::user()->students->nama ?? Auth::user()->name }}</span>
                                </a>
                            @else
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                                    <img src="{{ asset('img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded mr-1" alt="{{ Auth::user()->guru->nama ?? Auth::user()->name }}" /> <span class="text-dark">{{ Auth::user()->guru->nama ?? Auth::user()->name }}</span>
                                </a>
                            @endif
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                <div class="container-fluid p-0">

                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3><strong>Absen-In {{ $role }}</strong></h3>
                        </div>
                        <div class="col-auto ml-auto text-right mt-n1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                                    <h3 class="timestamp" id="timestamp"></h3>
                                </ol>
                            </nav>
                        </div>
                    </div>
