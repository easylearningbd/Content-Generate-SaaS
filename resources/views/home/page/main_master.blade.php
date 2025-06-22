<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}">
    <title>EasyGen - AI Writer SaaS Application.</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css?v1.5.0') }}">

     

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<body class="nk-body " data-menu-collapse="lg">
    <div class="nk-app-root ">

        @include('home.page.body.header')

        <main class="nk-pages">
           @yield('page')
        </main>
     @include('home.body.footer')   
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend/assets/js/bundle.js?v1.5.0') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js?v1.5.0') }}"></script>
   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

</body>

</html>