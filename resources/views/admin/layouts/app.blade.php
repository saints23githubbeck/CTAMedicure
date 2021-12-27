<!doctype html>
<html lang="en">
@include('admin.layouts.header')
<body >
@include('admin.layouts.sidebar')
<div class="main-content" id="panel">
 @include('admin.layouts.topNavbar')
@yield('content')
</div>
<!-- Footer -->
@include('admin.layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
<script>
    var elem = document.documentElement;
    var show = document.getElementById('show');
    var hide = document.getElementById('hide');
     
    function openFullscreen() {
      show.style.display = 'none';
      hide.style.display = 'block';

      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
      }
    }
    
    function closeFullscreen() {
      show.style.display = 'block';
      hide.style.display = 'none';

      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
        
      }
    }
  function loading(){
   location.reload();
  }
    </script>
<script>
    // var now = new Date(),
    //     until = new Date(now.getFullYear() + 10, now.getMonth());

    // $('#picker').mobiscroll().datepicker({
    //     controls: ['date'],
    //     dateFormat: 'MM/YYYY',
    //     dateWheels: '|MMMM YYYY|',
    //     min: now,
    //     max: until,
    //     touchUi: true
    // });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="{{asset('../assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script> --}}

<script src="{{asset('../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('../assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<script src="{{asset('../assets/vendor/tavo-calendar/moment.js')}}"></script>
<script src="{{asset('../assets/vendor/tavo-calendar/tavo-calendar.js')}}"></script>

<!-- Optional JS -->
<script src="{{asset('../assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('../assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('../assets/js/argon.js?v=1.2.0')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('footer_script')
<script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
    });
</script>

</body>

</html>
