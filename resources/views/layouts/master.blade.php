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
        <script>
            AOS.init();

            $('.ml6 .letters').each(function(){
                $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
            });

            anime.timeline({loop: true})
                .add({
                    targets: '.ml6 .letter',
                    translateY: ["1.1em", 0],
                    translateZ: 0,
                    duration: 750,
                    delay: function(el, i) {
                        return 50 * i;
                    }
                }).add({
                targets: '.ml6',
                opacity: 1,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 5000
            });


        </script>
        @yield('extra-scripts')
    </body>


</html>
