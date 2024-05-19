<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GedeBook - Dashboard</title>
    <!-- Include CSS files -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Gedebook</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
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
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <br>
                <br>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Anggota</h1>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
                        Buat Data Anggota
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Buat Data Anggota</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option selected disabled>--- Pilih Jenis Kelamin ---</option>
                                                <option>Laki-Laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Kelas</label>
                                        <input type="text" class="form-control" placeholder="Kelas">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" class="form-control" placeholder="Email">
                                      </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        </div>
                    </div>

                    <!-- Tabel Data Buku -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Email</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Isi tabel di sini -->
                                <tr>
                                    <td>1</td>
                                    <td>Najla Alfya Utami</td>
                                    <td>Perempuan</td>
                                    <td>10 Animasi 3</td>
                                    <td>najlaalfyautami@gmail.com</td>
                                    <td>
                                        <!-- Tambahkan tombol aksi di sini -->
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Cynthia Pradipta</td>
                                    <td>Perempuan</td>
                                    <td>10 Animasi 3</td>
                                    <td>cynthiapradipta@gmail.com</td>
                                    <td>
                                        <!-- Tambahkan tombol aksi di sini -->
                                        <button class="btn btn-primary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="text-center my-auto">
                        <span>Powered by GedeBook</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.js')}}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

</body>

</html>
