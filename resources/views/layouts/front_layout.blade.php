<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SalesForce - @yield('title') </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('asset/css/app.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('asset/img/favicon.ico') }}' />
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      
      @include('layouts.front_nav')

      
      <!-- <main class="container"> -->
        <section class="section">
          
          <div class="page-header">
              <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">@yield('title')</h2>
                  @if (session('success'))
                      <div class="alert alert-success text-center" role="alert">
                          {{ session('success') }}
                      </div>   
                  @elseif (session('error'))
                      <div class="alert alert-danger text-center" role="alert">
                          {{ session('error') }}
                      </div>
                  @endif
              </div>
          </div>
        <div class="main-content">
          @yield('content')
        </div>
        
        </section>
    <!-- </main> -->

    <!-- <footer class="main-footer">
      <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
      </div>
      <div class="footer-right">
        left footer item
      </div>
    </footer> -->
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('asset/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('asset/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('asset/js/page/index.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('asset/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('asset/js/custom.js') }}"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>