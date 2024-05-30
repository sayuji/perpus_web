<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Reset Password | Starlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/login/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/login/style.css') }}">
</head>

<body>
    <div class="wrap d-md-flex">
        <div class="img" style="background-image: url({{ asset('assets/login/bacabuku.png') }}); height: 100vh;">
        </div>
        <div class="login-wrap p-4 p-md-5" style="padding-top: 125px !important">
            <div class="d-flex">
                <div class="w-100">
                    <h3 class="mb-4">Reset Password</h3>
                </div>
            </div>
            <form action="#" class="signin-form">
                <div class="form-group mb-3">
                    <label class="label" for="name">Email</label>
                    <input type="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group mb-3">
                    <label class="label" for="name">New Password</label>
                    <input type="text" class="form-control" placeholder="New Password" required="">
                </div>
                <div class="form-group mb-3">
                    <label class="label" for="name">Confirm New Password</label>
                    <input type="text" class="form-control" placeholder="Confirm New Password" required="">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color: #4e73df !important">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/login/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login/popper.js') }}"></script>
    <script src="{{ asset('assets/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/login/main.js') }}"></script>


</body>

</html>
