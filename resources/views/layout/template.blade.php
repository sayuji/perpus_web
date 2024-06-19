<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Starlib</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.0.7/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/rating') }}/themes/krajee-fa/theme.css" media="all" type="text/css"/>
    <style>
        .custom-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #16d840;
            color: white;
            padding: 20px;
            border-radius: 10px;
            display: none;
            z-index: 1000;
        }
        .alert-error {
            background-color: red;
        }
    </style>
    <style>
        .rating-container {
            margin-bottom: -20px !important;
        }
        .sticky-footer {
            padding: 1.5rem 0 !important;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Starlib's</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-book"></i>
                    @if(Auth::user()->role !== 'anggota')
                        <span>Dashboard</span>
                    @endif
                    @if(Auth::user()->role === 'anggota')
                        <span>Rak Buku</span>
                    @endif
                </a>
            </li>
            <hr class="sidebar-divider">
            @if(Auth::user()->role !== 'anggota')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('data_kategori') }}">
                    <span>Data Kategori</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->role !== 'anggota')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('data_buku') }}">
                    <span>Data Buku</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->role !== 'anggota')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('data_anggota') }}">
                    <span>Data Anggota</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->role !== 'petugas')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('favorite.books') }}">
                    <span>Buku Favorite</span>
                </a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('peminjaman') }}">
                    <span>Peminjaman</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('pengembalian') }}">
                    <span>Pengembalian</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('logout') }}">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{ route('profile') }}">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 large">{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                    <div class="custom-alert" id="success-alert"></div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="text-center my-auto">
                    <span>Powered by Starlib</span>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/sb-admin-2.js')}}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.0.7/js/star-rating.js" type="text/javascript"></script>
    <script>
        $('.rating').rating({
            theme: 'krajee-fa',
            filledStar: '<i class="fa fa-star"></i>',
            emptyStar: '<i class="fa-regular fa-star"></i>',

            starCaptions: {
                0.5: '0.5 Stars',
                1: '1 Stars',
                1.5: '1.5 Stars',
                2: '2 Stars',
                2.5: '2.5 Stars',
                3: '3 Stars',
                3.5: '3.5 Stars',
                4: '4 Stars',
                4.5: '4.5 Stars',
                5: '5 Stars',
            },
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('error') || session('success'))
                const alertBox = $('#success-alert');
                alertBox.css('display', 'block');

                @if (session('error'))
                    alertBox.addClass('alert-error')
                @endif

                alertBox.html("{{ session('success') }}{{ session('error') }}")

                setTimeout(function() {
                    alertBox.css('display', 'none');
                }, 3000);
            @endif
        });
    </script>
</body>
</html>
