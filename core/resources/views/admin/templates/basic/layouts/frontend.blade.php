
{{-- <!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- site favicon -->
   <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.15.4/dist/full.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2/dist/tailwind.min.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/style.css')}}" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
    </style>
        @stack('style')
  <title> {{ $general->sitename(__($pageTitle)) }}</title>
</head>

<body class="container mx-auto " style="font-family: 'Poppins', sans-serif;">
    @include('partials.plugins')
    @include('partials.notify')
  <!-- NAVBAR STARTS -->
  @include('templates.basic.partials.header')
  <!-- NAVBAR ENDS -->

  <!-- BANNER STARTS -->
 <div class="row">
    <div class="col-12">
 @yield('content')
    </div>

 </div>
  <!-- FOOTER STARTS -->

  @include('templates.basic.partials.footer')

  <!-- FOOTER ENDS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
  @stack('script')
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $general->sitename(__($pageTitle)) }}</title>
    <!-- favicon link -->
    <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
    <!-- google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'kitocard/css/fontawesome-all.min.css')}}">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'kitocard/css/bootstrap.min.css')}}/">
    <!-- animated headline css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'kitocard/css/animated-headline.csss')}}">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'kitocard/css/line-awesome.min.css')}}">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'kitocard/css/swiper.min.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'kitocard/css/animate.css')}}">
    <!-- main style css link -->
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'kitocard/css/style.css')}}">
    @stack('style')
</head>

<body>
    @include('partials.plugins')
    @include('partials.notify')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Preloader
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="preloader">
    <div class="loader-inner">
        <div class="loader-circle">
            <img src="{{asset($activeTemplateTrue.'kitocard/images/favicon.png')}}" alt="Preloader">
        </div>
        <div class="loader-line-mask">
        <div class="loader-line"></div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Preloader
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@include('templates.basic.partials.header')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@yield('content')


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@include('templates.basic.partials.footer')

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Scroll-To-Top
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<a href="#" class="scrollToTop">
    <i class="las la-dot-circle"></i>
    <span>Top</span>
</a>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Scroll-To-Top
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->





<!-- jquery -->
<script src="{{asset($activeTemplateTrue.'kitocard/js/jquery-3.5.1.min.js')}}"></script>
<!-- animated headline js -->
<script src="{{asset($activeTemplateTrue.'kitocard/js/animated-headline.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset($activeTemplateTrue.'kitocard/js/bootstrap.bundle.min.js')}}"></script>
<!-- swiper js -->
<script src="{{asset($activeTemplateTrue.'kitocard/js/swiper.min.js')}}"></script>
<!-- main -->
<script src="{{asset($activeTemplateTrue.'kitocard/js/main.js')}}"></script>

@stack('script')


</body>

</html>
