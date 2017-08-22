<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
    <style>
.navbar-fixed {
    top: 0;
    z-index: 100;
    position: fixed;
    width: 100%;

}
    </style>
</head>

<body>
    <div id="app">
        <!-- Main container -->
        
            <nav class="navbar navbar-fixed" style="background-color:#222222;">
                <div class="navbar-brand">
                    <a class="navbar-item" href="http://bulma.io">
                    <!--<img src="http://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
                -->
                 LOGO
                </a>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item">
                        <p class="control">
                            <a class="button is-primary" href="/file/">
                                <span class="icon"><i class="fa fa-file"></i> </span> <span>ไฟล์</span>
                            </a>
                        </p>
                    </div>
                    <div class="navbar-item">
                        <p class="control">
                            <a class="button is-primary" href="/category/">
                                <span class="icon"><i class="fa fa-folder"></i> </span> <span>แฟ้ม</span>
                            </a>
                        </p>
                    </div>
                </div>
        </nav>
        
        @yield('content')

    </div>

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>

    <script>
      
    </script>
</body>

</html>