<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo　Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content todoContainer">
                <div class="title m-b-md">
                    Login
                </div>

                <form class="todoForm">
                    <dl class="formDl">
                        <dt><label for="exampleInputEmail1">Email address</label></dt>
                        <dd>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <small class="form-text textError">We'll never share your email with anyone else.</small>
                        </dd>

                        <dt><label for="exampleInputPassword1">Password</label></dt>
                        <dd>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </dd>
                    </dl>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </body>
</html>
