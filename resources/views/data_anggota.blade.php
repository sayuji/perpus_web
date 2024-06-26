@extends('layout.template')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Data Anggota</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">
    Buat Data Anggota
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Data Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tambah_anggota') }}" method="POST" id="form-anggota">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="name">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="name">Kelas</label>
                                <input type="text" class="form-control" placeholder="Kelas" required="" value="{{ old('kelas') }}" name="kelas">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label">Jenis Kelamin</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                    <option {{ !old('jenis_kelamin') ? 'selected' : '' }} disabled>-- Pilih Jenis Kelamin --</option>
                                    <option value="laki-laki" {{ old('jenis_kelamin') === 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="perempuan" {{ old('jenis_kelamin') === 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                            <option {{ !old('role') ? 'selected' : '' }} disabled>-- Pilih Role --</option>
                            <option value="petugas" {{ old('petugas') === 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="anggota" {{ old('anggota') === 'anggota' ? 'selected' : '' }}>Anggota</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" required="" value="{{ old('password') }}" name="password">
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" required="" value="{{ old('password_confirmation') }}" name="password_confirmation">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="$('#form-anggota').submit()">Simpan</button>
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
                <h5 class="modal-title" id="editModalLabel">Edit Data Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_nama">Nama</label>
                        <input type="text" class="form-control" id="edit_nama" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="edit_jenis_kelamin" name="jenis_kelamin" required>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_kelas">Kelas</label>
                        <input type="text" class="form-control" id="edit_kelas" name="kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_role">Role</label>
                        <select class="form-control" id="edit_role" name="role" required>
                            <option value="petugas">Petugas</option>
                            <option value="anggota">Anggota</option>
                        </select>
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
    function editAnggota(id) {
        $.get('/anggota/' + id + '/edit', function (data) {
            $('#edit_nama').val(data.name);
            $('#edit_jenis_kelamin').val(data.jenis_kelamin);
            $('#edit_kelas').val(data.kelas);
            $('#edit_email').val(data.email);
            $('#edit_role').val(data.role);
            $('#edit-form').attr('action', '/anggota/' + id);
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
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Email</th>
                <th>Role</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i => $anggota)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $anggota->name }}</td>
                <td>{{ $anggota->jenis_kelamin }}</td>
                <td>{{ $anggota->kelas }}</td>
                <td>{{ $anggota->email }}</td>
                <td>{{ $anggota->role }}</td>
                <td>
                    <button class="btn btn-primary" onclick="editAnggota('{{ $anggota->id }}')">Edit</button>
                    <form action="{{ route('hapus_anggota', $anggota->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
