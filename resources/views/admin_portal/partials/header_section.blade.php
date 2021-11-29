<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        window.csrf_token = "{{csrf_token()}}";
    </script>
    <title>{{ config('app.name') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin_assets/vendors/iconfonts/mdi/css/materialdesignicons.css') }}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset( 'admin_assets/css/shared/style.css' ) }}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{ asset('admin_assets/css/demo_1/style.css') }}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{ asset('admin_assets/images/favicon.ico') }}" />
    @yield('extra-style-section')
  </head>
  <body class="header-fixed">
