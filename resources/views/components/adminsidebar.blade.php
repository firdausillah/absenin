<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-center" href="index.php">
            <span class="align-middle"> <img src="{{ asset('img/icons/logo-absenin-sm-white.png') }}" class="mr-1" height="20px" alt="Logo"> Absen-In</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
                <?php $seg = request()->segment(2); ?>
            <li class="sidebar-item{{ $seg == 'dashboard' ? ' active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item{{ $seg == 'kelas' or $seg == "jam-absen-guru" or $seg == "daftar-hari-libur" or $seg == "jam-absen-siswa" or $seg == "jadwal-pelajaran" ? ' active' : '' }}">
                <a data-target="#ui" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Master Data</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse{{ $seg == 'kelas' or $seg == "jam-absen-guru" or $seg == "jam-absen-siswa" or $seg == "jadwal-pelajaran" or $seg == "daftar-hari-libur" ? ' show' : '' }}" data-parent="#sidebar" style="">
                    <li class="sidebar-item{{ $seg == 'kelas' ? ' active' : '' }}"><a class="sidebar-link" href="{{ route('admin.grade') }}">Kelas</a></li>
                    <li class="sidebar-item{{ $seg == "jam-absen-guru" ? ' active' : '' }}"><a class="sidebar-link" href="{{ route('admin.hour.guru') }}">Jam Absen Guru</a></li>
                    <li class="sidebar-item{{ $seg == "jam-absen-siswa" ? ' active' : '' }}"><a class="sidebar-link" href="{{ route('admin.hour.siswa') }}">Jam Absen Siswa</a></li>
                    <li class="sidebar-item{{ $seg == "daftar-hari-libur" ? ' active' : '' }}"><a class="sidebar-link" href="{{ route('admin.dayOff') }}">Daftar Hari Libur</a></li>
                    <li class="sidebar-item{{ $seg == "jadwal-pelajaran" ? ' active' : '' }}"><a class="sidebar-link" href="{{ route('admin.schedule') }}">Jadwal Pelajaran</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="data-sekolah-form.php">Data Sekolah</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="data-guru.php">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Guru</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="data-siswa.php">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Siswa</span>
                </a>
            <li class="sidebar-item">
                <a class="sidebar-link" href="data-user.php">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data User</span>
                </a>
            </li>

            <li class="sidebar-header">
                Absensi
            </li>

            <li class="sidebar-item">
                <a data-target="#absen-guru" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Absensi Guru</span>
                </a>
                <ul id="absen-guru" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar" style="">
                    <li class="sidebar-item"><a class="sidebar-link" href="absensi-guru-harian.php">Absensi Hari Ini</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="absensi-guru-bulanan.php">Absensi Bulanan</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-target="#absen-siswa" data-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
                    <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Absensi Siswa</span>
                </a>
                <ul id="absen-siswa" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar" style="">
                    <li class="sidebar-item"><a class="sidebar-link" href="absensi-siswa-harian.php">Absensi Hari Ini</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="absensi-siswa-bulanan.php">Absensi Bulanan</a></li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
