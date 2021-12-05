  <div class="page-body">
    <!-- sidebar -->
    @include('admin_portal.partials.sidebar_section')
    <!-- sidebar -->
    <div class="page-content-wrapper">
        @yield("page-content-wrapper-inner")
      <!-- content viewport ends -->

       <!-- footer section starts -->
        @yield("footer")
      <!-- footer section ends -->
    </div>
    <!-- page content ends -->
  </div>
  <!--page body ends -->
