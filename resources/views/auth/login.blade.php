<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.ico') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Login - Light Bootstrap Dashboard</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="main-panel" style="width: 100%;">
            <div class="content">
                <div class="container" style="margin-top: 100px; max-width: 400px;">
                    <div class="card">
                        <div class="header text-center">
                            <h4 class="title">Login</h4>
                            <p class="category">Sign in to your account</p>
                        </div>
                        <div class="content">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" required autofocus>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember"> Remember me
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-fill btn-block">Login</button>

                                {{-- <div class="text-center mt-3">
                                    <a href="{{ route('password.request') }}">Forgot password?</a> |
                                    <a href="{{ route('register') }}">Create account</a>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                    <div class="footer text-center mt-4" style="color: #888;">
                        &copy; <script>document.write(new Date().getFullYear());</script> Light Bootstrap Dashboard
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>
</body>

</html>
