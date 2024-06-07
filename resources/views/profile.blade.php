@extends('layout.template')

@section('content')
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
            $('#edit-form').attr('action', '/anggota/' + id);
            $('#editModal').modal('show');
        });
    }
</script>

<div class="container mt-4 mb-4 ">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0 text-center">Profile</h4>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <img src="https://via.placeholder.com/150" class="rounded-circle img-thumbnail" alt="User Profile Picture">
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <p><strong>Nama:</strong></p>
                </div>
                <div class="col-md-6">
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Jenis Kelamin:</strong></p>
                </div>
                <div class="col-md-6">
                    <p>{{ Auth::user()->jenis_kelamin }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Kelas:</strong></p>
                </div>
                <div class="col-md-6">
                    <p>{{ Auth::user()->kelas }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email:</strong></p>
                </div>
                <div class="col-md-6">
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Role:</strong></p>
                </div>
                <div class="col-md-6">
                    <p>{{ Auth::user()->role }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <button class="btn btn-primary" onclick="editAnggota('{{ Auth::user()->id }}')">Edit Profile</button>
        </div>
    </div>
</div>
@endsection
