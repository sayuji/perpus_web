@extends('layout.template')

@section('content')


<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Kategori</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
    Buat Kategori
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tambah_kategori') }}" method="POST" id="form-kategori">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                        <input type="text" class="form-control" placeholder="Nama Kategori" name="nama_kategori">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="$('#form-kategori').submit()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Data Buku -->
<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_nama_kategori">Kategori</label>
                        <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('edit-form').submit()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk memuat data ke modal -->
<script>
    function editKategori(id, nama) {
        const form = document.getElementById('edit-form');
        form.action = '/kategori/' + id;
        document.getElementById('edit_nama_kategori').value = nama;
        $('#editModal').modal('show');
    }
</script>

<!-- Tabel Data Buku -->
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $kategori)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>
                    <button class="btn btn-primary" onclick="editKategori('{{ $kategori->id }}', '{{ $kategori->nama_kategori }}')">Edit</button>
                    <form action="{{ route('hapus_kategori', $kategori->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
