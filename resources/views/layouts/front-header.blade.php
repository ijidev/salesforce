<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <link rel="stylesheet" href="{{ asset('frontassets/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontassets/login.css') }}">
       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Salesforce</title>

        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css"> --}}

        <!-- Custom Font Icons CSS-->
        {{-- <link rel="stylesheet" href="{{ asset('assets/css/font.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    </head>

    <body>

        <style>
            .loader-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 9999;
            }

            .loader {
                border: 4px solid #f3f3f3;
                border-top: 4px solid #3498db;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                animation: spin 2s linear infinite;
            }

            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }

            .loader p {
                margin-top: 20px;
                color: white;
                font-weight: bold;
            }

        </style>

        <div class="loader-wrapper" id="loader">
            <div class="loader"></div>
            <p> Loading...</p>
        </div>

        <header>
            <div>
                <a href="{{ route('home') }}">
                    <img src="{{ asset('frontassets/images/logo-salesforce.svg') }}" width="70" alt="logo">
                    {{-- <h3>SalesForce</h3> --}}
                </a>
            </div>
            <div class="user">
                {{-- <a href="{{ route('profile') }}">
                    <img src="{{ asset('frontassets/images/notify.png') }}" width="25" alt="profile"> 
                </a> --}}
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('frontassets/images/profile.png') }}" width="25" alt="profile"> 
                    Profile
                </a>

                <a href="{{ route('logou') }}">
                    Logout
                </a>
            </div>
        </header>

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
        
        <main class="container">
            <section>
                @yield('content')
                {{-- <div id="calender">calender</div> --}}
            </section>
        </main>

        <footer>
            <div class="footer-card">

                <a href="{{ route('home') }}">
                    <img src="{{ asset('frontassets/images/home.png') }}" width="25" alt="home">
                    <br>
                        Home
                    </div>
                </a>


            <div class="footer-card">
                <a href="{{ route('contact') }}">
                <img src="{{ asset('frontassets/images/sopport-footer.png') }}" height="25" width="25" alt=""> 
                <br>
                    <span>
                        Support
                    </span>
                </a>
            </div>
        

            <div class="card-top">
                <a href="{{ route('getstarted') }}">
                    <div class="footer-card-top">
                        <img src="{{ asset('frontassets/images/BG-28.png') }}" height="35" width="35" alt=""> 
                    </div>
                    Start Now
                </a>
            </div>
        
            <div class="footer-card">
                <a href="{{ route('record') }}">
                    <img src="{{ asset('frontassets/images/records.png') }}" height="25" width="25" alt="">
                {{-- @if ($notify->count() >= 1)
                    <div class="badge">{{ $notify->count() }}</div>
                @endif --}}
                <br>
                    records 
                </a>
            </div>

            <div class="footer-card">
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('frontassets/images/profile.png') }}" width="25" alt="profile"> <br>
                    Profile
                </a>
            </div>

        </footer>

        {{-- <script type="text/javascript">
            
        </script> --}}
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
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>
        <script src="{{ asset('frontassets/model.js') }}"></script>
        <script src="{{ asset('frontassets/custom.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const modal = document.getElementById("popup");
                const closeModal = document.getElementById("popCloseBtn");
            
                modal.style.display = "block";
            
                closeModal.addEventListener("click", function() {
                modal.style.display = "none";
                });
            });

            // document.addEventListener("DOMContentLoaded", function() {
            // const loader = document.getElementById("loader");
            // const content = document.querySelector("body");

            // // Simulate loading time (you can replace this with actual loading code)
            // setTimeout(function() {
            //     loader.style.display = "none";
            //     content.style.display = "block";
            // }, 10000); // Change 2000 to the actual loading time in milliseconds
            // });

            document.onreadystatechange = function() {
                if (document.readyState !== "complete") {
                    document.querySelector(
                        "body").style.visibility = "hidden";
                    document.querySelector(
                        "#loader").style.visibility = "visible";
                } else {
                    document.querySelector(
                        "#loader").style.display = "none";
                    document.querySelector(
                        "body").style.visibility = "visible";
                }
            }
        </script>

        
    </body>

    <div id="certModal" class="modal">
        <div class="modal-content">
            <span class="close" id="certCloseBtn">&times;</span>
            <h2>Certificate</h2>
            <img src="{{ asset('frontassets/images/cert.png') }}" width="auto" alt="certificate">
        </div>
    </div>

        
    

</html>
