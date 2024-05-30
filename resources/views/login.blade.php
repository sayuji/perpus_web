<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Login | Starlib</title>
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
        <div class="login-wrap p-4 p-md-5" style="padding-top: 125px !important">
            <div class="d-flex">
                <div class="w-100">
                    <h3 class="mb-4">Sign In</h3>
                </div>
            </div>
            <form action="{{ route('login') }}" method="POST" class="signin-form">
                @csrf
                <div class="form-group mb-3">
                    <label class="label" for="name">Email</label>
                    <input type="text" class="form-control" placeholder="Email" required="" value="{{ old('email') }}" name="email">
                </div>
                <div class="form-group mb-3">
                    <label class="label" for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color: #4e73df !important">Sign
                        In</button>
                </div>
                <div class="form-group d-md-flex">
                    <div class="w-100 text-md-right">
                        <a href="{{ route('reset_password') }}" style="color: #4e73df">Forgot Password?</a>
                    </div>
                </div>
            </form>
            <p class="text-center">Not a member? <a href="{{ route('register') }}" style="color: #4e73df">Sign Up</a></p>
        </div>
    </div>
    <script src="{{ asset('assets/login/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login/popper.js') }}"></script>
    <script src="{{ asset('assets/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login/main.js') }}"></script>


</body>

</html>
