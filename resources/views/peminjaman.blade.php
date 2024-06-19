@extends('layout.template')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Peminjaman</h1>

    @if(Auth::user()->role !== 'petugas')
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
        Ajukan Peminjaman
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajukan Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ajukan_peminjaman') }}" method="POST" id="form-peminjaman">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Buku</label>
                        <select class="form-control" name="buku" required>
                            @foreach ($data_buku as $i => $buku)
                                <option value="{{ $buku->id }}">{{ $buku->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" placeholder="Tanggal Peminjaman" name="tanggal_peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" placeholder="Tanggal Pengembalian" name="tanggal_pengembalian">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="$('#form-peminjaman').submit()">Simpan</button>
            </div>
        </div>
    </div>
    </div>
    @endif

    <!-- Button to Print the Table -->
    <button type="button" class="btn btn-primary mb-4" onclick="printTable()">Print</button>

    <!-- Tabel Data Buku -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Buku</th>
                    <th>Nama</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_peminjaman as $i => $peminjaman)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $peminjaman->get_buku->judul }}</td>
                    <td>{{ $peminjaman->get_user->name }}</td>
                    <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                    <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                    <td>{{ $peminjaman->status }}</td>
                    <td>
                        @if ($peminjaman->status === 'Menunggu Approval' && Auth::user()->role === 'petugas')
                            <a href="{{ route('approve_peminjaman', $peminjaman->id) }}" class="btn btn-success">Approve</a>
                            <a href="{{ route('reject_peminjaman', $peminjaman->id) }}" class="btn btn-danger">Reject</a>
                        @endif
                        @if ($peminjaman->status === 'Dipinjam' && Auth::user()->role === 'petugas')
                            <a href="{{ route('peminjaman_pengembalian', $peminjaman->id) }}" class="btn btn-warning">Pengembalian</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function printTable() {
            var divToPrint = document.getElementById('dataTable');
            var newWin = window.open('');
            newWin.document.write('<html><head><title>Print Table</title>');
            newWin.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">');
            newWin.document.write('</head><body>');
            newWin.document.write('<h1 class="h3 mb-4 text-gray-800">Peminjaman</h1>');
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
            newWin.print();
        }
    </script>

@endsection
