<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #000 !important;
                color: #FFF !important;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background: url(images/thanks.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: 100% 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #FFF;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        <style>

            .logo{
                position: fixed;
                bottom: 0;
                left: 0;
                margin: auto;
                position: absolute;
                right: 0;
                top: -120px;
            }
            .loader {
                background: #000;
                background: radial-gradient(#222, #000);
                bottom: 0;
                left: 0;
                overflow: hidden;
                position: fixed;
                right: 0;
                top: 0;
                z-index: 99999;
            }

            .loader-inner {
                bottom: 0;
                height: 100px;
                left: 0;
                margin: auto;
                position: absolute;
                right: 0;
                top: 0;
                width: 100px;
                background: rgba(0,0,0,.8);
                border-radius: 50px;
            }

            .loader-line-wrap {
                animation:
                    spin 2000ms cubic-bezier(.175, .885, .32, 1.275) infinite
            ;
                box-sizing: border-box;
                height: 50px;
                left: 0;
                overflow: hidden;
                position: absolute;
                top: 0;
                transform-origin: 50% 100%;
                width: 100px;
            }
            .loader-line {
                border: 4px solid transparent;
                border-radius: 100%;
                box-sizing: border-box;
                height: 100px;
                left: 0;
                margin: 0 auto;
                position: absolute;
                right: 0;
                top: 0;
                width: 100px;
            }
            .loader-line-wrap:nth-child(1) { animation-delay: -50ms; }
            .loader-line-wrap:nth-child(2) { animation-delay: -100ms; }
            .loader-line-wrap:nth-child(3) { animation-delay: -150ms; }
            .loader-line-wrap:nth-child(4) { animation-delay: -200ms; }
            .loader-line-wrap:nth-child(5) { animation-delay: -250ms; }

            .loader-line-wrap:nth-child(1) .loader-line {
                border-color: hsl(0, 80%, 60%);
                height: 90px;
                width: 90px;
                top: 7px;
            }
            .loader-line-wrap:nth-child(2) .loader-line {
                border-color: hsl(60, 80%, 60%);
                height: 76px;
                width: 76px;
                top: 14px;
            }
            .loader-line-wrap:nth-child(3) .loader-line {
                border-color: hsl(120, 80%, 60%);
                height: 62px;
                width: 62px;
                top: 21px;
            }
            .loader-line-wrap:nth-child(4) .loader-line {
                border-color: hsl(180, 80%, 60%);
                height: 48px;
                width: 48px;
                top: 28px;
            }
            .loader-line-wrap:nth-child(5) .loader-line {
                border-color: hsl(240, 80%, 60%);
                height: 34px;
                width: 34px;
                top: 35px;
            }

            @keyframes spin {
                0%, 15% {
                    transform: rotate(0);
                }
                100% {
                    transform: rotate(360deg);
                }
            }

        </style>
    </head>
    <body>
    <div id="loadingMask" style="width: 100%; height: 100%; position: absolute; background: #fff;">
        <div class="loader" style="text-align: center">
            <img class="logo" src="{{ asset('images/festipizza.png') }}" alt="">
            <div class="loader-inner" >
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
                <div class="loader-line-wrap">
                    <div class="loader-line"></div>
                </div>
            </div>
        </div>

    </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar Sesion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrate</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <a href="">

                </a>



            </div>
        </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        window.setTimeout(function(){

            // Move to a new location or you can do something else
            window.location.href = '{{url("/home")}}'

        }, 5000);

        $(document).ready( function() {

            /*
             * ... all of your jQuery ...
             */

            // At the bottom of your jQuery code, put this:
            $('#loadingMask').fadeOut();
        });
    </script>
    </body>
</html>
