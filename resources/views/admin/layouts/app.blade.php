<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard</title>
<link href="css/mobiscroll.jquery.min.css" rel="stylesheet" />
<script src="js/mobiscroll.jquery.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- Bootstrap core CSS -->
 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    {{-- <link href="css/material-dashboard.css?v=2.1.1" rel="stylesheet" /> --}}
    <style>
      
        #chart {
      width: 100%;
      margin: 20px 20px 20px 20px;
    }
      
    </style>

    <script>
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"><\/script>'
        )
      window.Promise ||
        document.write(
          '<script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"><\/script>'
        )
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    

    <script>
      // Replace Math.random() with a pseudo-random number generator to get reproducible results in e2e tests
      // Based on https://gist.github.com/blixt/f17b47c62508be59987b
      var _seed = 42;
      Math.random = function() {
        _seed = _seed * 16807 % 2147483647;
        return (_seed - 1) / 2147483646;
      };
    </script>
  </head>
<body id="body-pd">
    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    <!--Container Main start-->
    @yield('content')

<script>
    var now = new Date(),
    until = new Date(now.getFullYear() + 10, now.getMonth());
                    
$('#picker').mobiscroll().datepicker({
    controls: ['date'],
    dateFormat: 'MM/YYYY',
    dateWheels: '|MMMM YYYY|',
    min: now,
    max: until,
    touchUi: true
});
</script>
    <script src="js/dashboard.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/material-dashboard.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>
