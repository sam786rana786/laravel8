<!DOCTYPE html>
<html lang="en">

@include('layouts.body.css')

<body>

 @include('layouts.body.header')

  <main id="main">

    @yield('home_content');

  </main><!-- End #main -->

  @include('layouts.body.footer')


@include('layouts.body.js')

</body>

</html>
