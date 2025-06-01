<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.png') }}">
    <title>Admin Dashboard </title>
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css?v1.0.0') }}">
</head>

<body class="nk-body ">
    <div class="nk-app-root " data-sidebar-collapse="lg">
        <div class="nk-main">

    @include('admin.body.sidebar')    

            <div class="nk-wrap">
    @include('admin.body.mobile_sidebar')  

    <div class="nk-content">
        <div class="container-xl">
            
    @yield('admin')       

        </div>
    </div>
     @include('admin.body.footer')      
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/assets/js/bundle.js?v1.0.0') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.js?v1.0.0') }}"></script>
</body>

</html>