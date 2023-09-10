@include('layouts.header')

@include('layouts.sidebar')

<div class="page-content">
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
    <section class="no-padding-top no-padding-bottom">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>

@include('layouts.footer')
