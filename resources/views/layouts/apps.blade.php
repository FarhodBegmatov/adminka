<!DOCTYPE html>
<html lang="en">
<head>
    <title>AllDay.uz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="{{asset("layout/styles/layout.css") }}" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row0">
    @yield('top-bar')
</div>
<div class="wrapper row1">
    @yield('header')
    @yield('navbar')
</div>
<div class="wrapper bgded overlay" style="background-image:url('public/images/demo/backgrounds/01.png');">
    @yield('page-intro')
</div>
<div class="wrapper row3">
    @yield('main')
</div>
<div class="wrapper row2">
    @yield('services')
</div>
<div class="wrapper gradient">
    @yield('testimonials')
</div>
<div class="wrapper row2">
    @yield('latest')
</div>
<div class="wrapper gradient">
    @yield('contact')
</div>
<div class="wrapper row4">
    @yield('footer')
</div>
<div class="wrapper row5">
    <div id="copyright" class="hoc clear">
        <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
        <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    </div>
</div>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="{{ asset("layout/scripts/jquery.min.js") }}"></script>
<script src="{{ asset("layout/scripts/jquery.backtotop.js") }}"></script>
<script src="{{ asset("layout/scripts/jquery.mobilemenu.js") }}"></script>
</body>
</html>

