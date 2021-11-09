<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href="/css/bootstrap.min.css">
    <link rel = "stylesheet" href="/css/styles.css">
    <link rel = "stylesheet" href="/css/aos.css">
    <link href="/css/hover-min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    @yield('extra-styles')
    <link rel="icon" type="image/jpg" href="/images/logo.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        window.csrf_token = "{{csrf_token()}}";
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="wojfiAaQ184v3oKbdsyv-1FV4ivHMQ3P5_kEyNTzNQk" />
    <link rel="icon" type="image/jpg" href="/images/logo-main.png">
    <title>Medicure</title>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
</head>
