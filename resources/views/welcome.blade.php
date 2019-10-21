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
                background-image: url("{{ asset('images/chajka.jpg') }}");
                -moz-background-size: 100% 100%; /* Firefox  */
                -webkit-background-size: 100% 100%; /* Safari и Chrome  */
                -o-background-size: 100% 100%; /* Opera 9.6+  */
                background-size: 100% 100%; /* Другие браузеры  */
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: #3490dc;
            }
            a {
                color: #3490dc;
                font-size: 16px;
                padding: 10px;
                margin-right: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        @if(Auth::user()->isDisabled())
                            <strong>
                                <a href="{{ url('/') }}" style="color: #3490dc; text-decoration: none">Главная</a>
                            </strong>
                        @elseif (Auth::user()->isUser())
                            <strong>
                                <a href="{{ url('/') }}" style="color: #3490dc; text-decoration:
                                none">Главная</a>
                            </strong>
                            <strong>
                                <a href="{{ url('user/index') }}" style="color: #3490dc; text-decoration:
                                none">Кабинет</a>
                            </strong>
                        @elseif (Auth::user()->isVisitor())
                            <strong>
                                <a href="{{ url('/') }}" style="color: #3490dc; text-decoration:
                                none">Главная</a>
                            </strong>
                        @elseif (Auth::user()->isAdministrator())
                            <strong>
                                <a href="{{ url('/') }}" style="color: #3490dc; text-decoration:
                                none">Главная</a>
                            </strong>
                            <strong>
                                <a href="{{ url('admin/index') }}" style="color: #3490dc; text-decoration:
                                none">Панель Администратора</a>
                            </strong>
                        @endif

                            <strong>
                                <a class="dropdown-item" href="{{ url('/') }}" style="color: #3490dc; text-decoration:
                                none"
                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                            </strong>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="color: #3490dc;
                            text-decoration: none;">
                                @csrf
                            </form>

                        @else
                            <strong>
                                <a href="{{ route('login') }}" style="color: #3490dc; text-decoration:
                                    none">Войти</a>
                            </strong>

                            @if (Route::has('register'))
                                <strong>
                                    <a href="{{ route('register') }}" style="color: #3490dc; text-decoration:
                                    none">Регистрация</a>
                                </strong>
                            @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
            </div>
        </div>
    </body>
</html>
