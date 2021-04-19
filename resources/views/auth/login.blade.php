<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="{{ asset('img/icons/logo-absenin-sm.png') }}" />
    <title>Absen-In | Login</title>

    <link href="{{ asset('datatables/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="bg-login">
    <div class="limiter">
        <div class="container-login100">
            <div class="animated flipInX wrap-login100" style="padding-top:30px">
                <div id="formlogin" action="ceklogin.php" class="login100-form validate-form">
                    <span class="animated infinite pulse delay-5s login100-form-title p-b-26 ">
                        <img src="{{ asset('img/icons/absen-in.png') }}" style="max-height:80px" class="img-responsive" alt="Responsive image">
                    </span>
                    <span class="p-b-26">
						<h2 class="mb-3">LOGIN</h2>
                    </span>
                    <div class="tab-pane fade show active" id="form-siswa" role="tabpanel" aria-labelledby="form-siswa-tab">
                        <form action="{{ route('auth') }}" method="post">
                            @csrf
                            <div class="wrap-input100 validate-input" data-validate="Enter Username">
                                <input class="input100" type="text" name="username" value="" autocomplete="off">
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Enter password">
                                <input class="input100" type="password" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                                
                            @foreach($errors->all() as $e)
                                <div class="text-danger">* {{$e}}</div>
                            @endforeach

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn" type="submit">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        function Hapus() {
            Swal.fire({
                text: 'Apakah anda yakin akan menghapus data ini?',
                icon: 'error',
                confirmButtonText: 'Hapus'
            })
        }
    </script>
</body>

</html>