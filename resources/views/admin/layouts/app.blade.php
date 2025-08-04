<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />
    @include('admin.layouts.styles')
</head>

<body>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="main-panel">
            @include('admin.layouts.navbar')

            <div class="content">
                @yield('content')
            </div>

            @include('admin.layouts.footer')
        </div>
    </div>
</body>

@include('admin.layouts.scripts')

</html>
