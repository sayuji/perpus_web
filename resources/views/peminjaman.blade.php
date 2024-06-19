@extends('layout.template')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Peminjaman</h1>

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
