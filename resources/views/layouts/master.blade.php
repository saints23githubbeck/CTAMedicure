
<!DOCTYPE html>
<html lang="en">
    @include('layouts.header')
    <body>
        <div id="app">
            @include('layouts.nav')
            @yield('content')
            @include('layouts.footer')
        </div>
        <script src="/js/jquery.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        @yield('extra-scripts')
    </body>


</html>
