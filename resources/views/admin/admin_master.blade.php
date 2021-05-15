<!DOCTYPE html>
<html lang="en" dir="ltr">

@include('admin.header')

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>
    <div id="toaster"></div>
    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        @include('admin.left_sidebar')


        <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            @include('admin.topbar')


            <!-- ====================================
          ——— CONTENT WRAPPER
          ===================================== -->
            <div class="content-wrapper">
                <div class="content">
                    @yield('admin')
                </div> <!-- End Content -->
            </div> <!-- End Content Wrapper -->


            <!-- Footer -->
            @include('admin.footer')

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->


    <!-- <script type="module">
      import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

      const el = document.createElement('pwa-update');
      document.body.appendChild(el);
    </script> -->

    <!-- Javascript -->
    @include('admin.scripts')
</body>

</html>
