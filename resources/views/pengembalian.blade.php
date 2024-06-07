@extends('layout.template')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Pengembalian</h1>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Berikan Ulasan & Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-peminjaman">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ulasan</label>
                        <input type="text" class="form-control" placeholder="Ulasan" name="ulasan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Rating</label>
                        <input id="input-id-modal" name="rating" class="rating rating-loading" data-display-only="false" data-size="md">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="$('#form-peminjaman').submit()">Tambahkan Ulasan</button>
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
              <th>Buku</th>
              <th>Nama</th>
              <th>Tanggal Peminjaman</th>
              <th>Tanggal Pengembalian</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
            @if(Auth::user()->role !== 'petugas')
              <th>Pilihan</th>
            @endif
            </tr>
        </thead>
        <tbody>
            <!-- Isi tabel di sini -->
            @foreach ($data_peminjaman as $i => $peminjaman)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $peminjaman->get_buku->judul }}</td>
                <td>{{ $peminjaman->get_user->name }}</td>
                <td>{{ $peminjaman->tanggal_peminjaman }}</td>
                <td>{{ $peminjaman->tanggal_pengembalian }}</td>
                <td>{{ $peminjaman->tanggal_pengembalian_sebenarnya }}</td>
                <td>{{ $peminjaman->status }}</td>
                @if(Auth::user()->role !== 'petugas')
                <td>
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Berikan Ulasan</a>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
