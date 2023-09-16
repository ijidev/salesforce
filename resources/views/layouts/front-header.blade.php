<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salesforce</title>
    <link rel="stylesheet" href="{{ asset('frontassets/style.css') }}">
    </head>

    <body>
        <header>
            <div>
                <a href="{{ route('home') }}">
                    <h3>SalesForce</h3>
                </a>
            </div>
            <div class="user">
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('frontassets/images/profile.png') }}" width="25" alt="profile"> 
                Profile</a>

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
            </section>
        </main>

        <footer>
            <div class="footer-card">

            <img src="{{ asset('frontassets/images/home.png') }}" width="25" alt="home">
            <br>
            <a href="{{ route('home') }}">Home</a>
            </div>


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
                    Get Started
                </a>
            </div>
        
            <div class="footer-card">
                <img src="{{ asset('frontassets/images/notify.png') }}" height="25" width="25" alt="">  
                <br>
                <a href="{{ route('notify') }}">Notification</a>
            </div>

            <div class="footer-card">
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('frontassets/images/profile.png') }}" width="25" alt="profile"> <br>
                    Profile
                </a>
            </div>

        </footer>
        <script src="{{ asset('frontassets/model.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
    
</html>