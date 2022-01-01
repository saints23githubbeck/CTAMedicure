<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name") != "laravel" ? config('app.name') : "" }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
     <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
    <script src="/js/app.js"></script>
    {{-- <script src="/js/bootstrap.min.js"></script> --}}
    <!-- Styles -->
    {{-- <link rel = "stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
    {{-- <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> --}}
</head>
<body style="background-color: #e3e3e3; height: 100%">
    <div id="app">
        <main class="py-5">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js')}}">

    </script>
<!--huziafa start---->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @yield('extra-scripts')
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

        <!---huziafa end--->


        <!----------------Intishar MAshrur JS---------------->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

            <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
