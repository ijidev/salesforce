<!DOCTYPE html>
<html lang="en">
<head>

    
    <link rel="stylesheet" href="{{ asset('frontassets/login.css') }}">
    <link rel="stylesheet" href="{{ asset('frontassets/custom.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  <title>SalesForce</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <nav class="navbar sticky-top">
        <a href="{{ route('home') }}">
            <img src="{{ asset('frontassets/images/logo-salesforce.svg') }}" width="70" alt="logo">
        </a>
        <div id="my-nav" class="navbar-expand">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('profile') }}">
                        <img src="{{ asset('frontassets/images/profile.png') }}" width="25" alt="profile"> 
                        Profile
                    </a>

                    
                </li>

                <li>
                    <a href="{{ route('logou') }}">
                        Logout
                    </a>
                </li>
                
            </ul>
        </div>
    </nav>


    <div class="row justify-content-center mt-4 mb-4">
            <div class="col-md-8">
                <div id="calendar"></div>
            </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#calendar').fullCalendar({
    
            })
        });
    </script>
</body>
</html>