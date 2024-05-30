@extends('layout.template')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Buku</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
    Buat Data Buku
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tambah_buku') }}" method="POST" id="form-buku">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input type="text" class="form-control" placeholder="Judul" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <select class="form-control" id="tambah_kategori" name="kategori" required>
                        @foreach ($data_kategori as $i => $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penulis</label>
                        <input type="text" class="form-control" placeholder="Penulis" name="penulis">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penerbit</label>
                        <input type="text" class="form-control" placeholder="Penerbit" name="penerbit">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                        <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah</label>
                        <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="$('#form-buku').submit()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_judul">Judul</label>
                        <input type="text" class="form-control" id="edit_judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_kategori">Kategori</label>
                        <select class="form-control" id="edit_kategori" name="kategori" required>
                        @foreach ($data_kategori as $i => $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penulis</label>
                        <input type="text" class="form-control" id="edit_penulis" placeholder="Penulis" name="penulis">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Penerbit</label>
                        <input type="text" class="form-control" id="edit_penerbit" placeholder="Penerbit" name="penerbit">
                    </div>
                    <div class="form-group">
                        <label for="edit_deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi" placeholder="Deskripsi" name="deskripsi" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="edit_jumlah" name="jumlah" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="$('#edit-form').submit()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    function editBuku(id) {
        $.get('/buku/' + id + '/edit', function (data) {
            $('#edit_judul').val(data.judul);
            $('#edit_kategori').val(data.kategori);
            $('#edit_penulis').val(data.penulis);
            $('#edit_penerbit').val(data.penerbit);
            $('#edit_deskripsi').val(data.deskripsi);
            $('#edit_jumlah').val(data.jumlah);
            $('#edit-form').attr('action', '/buku/' + id);
            $('#editModal').modal('show');
        });
    }
</script>

<!-- Tabel Data Buku -->
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $buku)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->get_kategori->nama_kategori }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td width="300" title="{{$buku->deskripsi}}">{!! Str::limit($buku->deskripsi, 100, '...') !!}</td>
                <td>{{ $buku->jumlah }}</td>
                <td>
                    <button class="btn btn-primary" onclick="editBuku('{{ $buku->id }}')">Edit</button>
                    <form action="{{ route('hapus_buku', $buku->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
