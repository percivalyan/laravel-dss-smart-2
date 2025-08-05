<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.ico') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Error {{ $code }} - Light Bootstrap Dashboard</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <!-- Styles -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet">

    <style>
        .error-container {
            text-align: center;
            padding: 80px 20px;
        }

        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #FF6B6B;
        }

        .error-message {
            font-size: 22px;
            color: #555;
            margin-bottom: 30px;
        }

        .btn-home {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="main-panel" style="width: 100%;">
            <div class="content">
                <div class="container error-container">
                    <div class="error-code">{{ $code }}</div>
                    <div class="error-message">{{ $message }}</div>
                    <a href="{{ url('/login') }}" class="btn btn-primary btn-home">
                        <i class="fa fa-home"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('admin/assets/js/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>
</body>

</html>
