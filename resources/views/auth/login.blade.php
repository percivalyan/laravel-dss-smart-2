<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login - Dashboard</title>

    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.ico') }}" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #773fb9, #936ad3);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 15px;
            /* padding tambahan supaya gak mepet */
        }

        .login-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        .login-card h4 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .login-card .category {
            font-size: 14px;
            color: #888;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #773fb9;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
            transition: 0.3s ease-in-out;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #3c40a1;
        }

        .form-check-label {
            font-size: 14px;
        }

        .text-danger {
            font-size: 13px;
        }

        /* Responsive tweaks */
        @media (max-width: 576px) {
            .login-card {
                padding: 1.5rem 1rem;
                border-radius: 15px;
            }

            .login-card h4 {
                font-size: 1.5rem;
            }

            .login-card .category {
                font-size: 13px;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="text-center">
            <h4>Login</h4>
            <p class="category">Sign in to your account</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email"
                    value="satsukinio@gmail.com" required autofocus />
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                    value="satsukinio@gmail.com" required />
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-check mt-3">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" />
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
        </form>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('admin/assets/js/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
</body>

</html>
