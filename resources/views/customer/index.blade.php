<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @include('customer.layouts.css_main')

</head>

<body>

  <div class="site-wrap">


    @include('customer.layouts.navbar')
      @yield('lading_content')

{{--      main section--}}
    <div class="site-section">
      <div class="container">
          @yield('content')

      </div>
    </div>



{{--      second banner section --}}
        @include('customer.layouts.banner')

      {{--footer section --}}
      @include('customer.layouts.footer')
  </div>



</body>

</html>
