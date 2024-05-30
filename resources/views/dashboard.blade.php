<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Starlib - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
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
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Items -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('data_kategori') }}">
                    <span>Data Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('data_buku') }}">
                    <span>Data Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('data_anggota') }}">
                    <span>Data Anggota</span>
                </a>
            </li>
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
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 medium">{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <h2>Dashboard</h2>
                    <br>
                    <div class="row">
                        <!-- Card 1 -->
                        <style>
                            .card:hover {
                                transform: translateY(-5px);
                                transition: transform 0.3s;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                            }
                        </style>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">0</div>
                                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">Anggota</div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('data_anggota') }}" class="text-xm text-gray-800">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">0</div>
                                            <div class="text-xl font-weight-bold text-success text-uppercase mb-1">Buku</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('data_buku') }}" class="text-xm text-gray-800">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">0</div>
                                            <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">Pinjam</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('peminjaman') }}" class="text-xm text-gray-800">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h1 mb-0 font-weight-bold text-gray-800">0</div>
                                            <div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Dikembalikan</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-3x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <a href="{{ route('pengembalian') }}" class="text-xm text-gray-800">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
