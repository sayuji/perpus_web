<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Register | Starlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/login/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login/style.css') }}">
</head>

<body>
    <div class="wrap d-md-flex">
        <div class="img" style="background-image: url({{ asset('assets/login/bacabuku.png') }}); height: 100vh;">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="login-wrap p-4 p-md-5" style="padding-top: 20px !important; padding-bottom: 0 !important ">
            <div class="d-flex">
                <div class="w-100">
                    <h3 class="mb-4">Sign Up</h3>
                </div>
            </div>
            <form action="{{ route('register') }}" method="POST" class="signin-form">
                @csrf
                <div class="form-group mb-3">
                    <label class="label" for="name">Fullname</label>
                    <input type="text" class="form-control" placeholder="Fullname" required="" value="{{ old('name') }}" name="name">
                </div>
                <div class="form-group mb-3">
                    <label class="label" for="name">Email</label>
                    <input type="email" class="form-control" placeholder="Email" required="" value="{{ old('email') }}" name="email">
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
                <div class="form-group mb-3">
                    <label class="label" for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Password" required="" value="{{ old('password') }}" name="password">
                </div>
                <div class="form-group mb-3">
                    <label class="label" for="password">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" required="" value="{{ old('password_confirmation') }}" name="password_confirmation">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color: #4e73df !important">Sign
                        Up</button>
                </div>
            </form>
            <p class="text-center">already have an account? <a href="{{ route('login') }}" style="color: #4e73df">Sign In</a></p>
        </div>
    </div>
    <script src="{{ asset('assets/login/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login/popper.js') }}"></script>
    <script src="{{ asset('assets/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login/main.js') }}"></script>


</body>

</html>
