<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo　Create</title>

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
                    Create
                </div>

                <form action="{{ route('create') }}" method="POST" class="todoForm">
                    {{ csrf_field() }}

                    <dl class="formDl">
                        <dt>タイトル</dt>
                        <dd>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"/>
                            @error('title')
                            <small class="form-text textError">{{$message}}</small>
                            @enderror
                        </dd>

                        <dt>内容</dt>
                        <dd>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            <small class="form-text textError"></small>
                        </dd>
                    </dl>
                    <ul class="btnList">
                        <li><a href="{{ route('index') }}" class="btn btn-light">Back</a></li>
                        <li><input type="submit" class="btn btn-primary" value="Submit"/></li>
                    </ul>
                </form>

            </div>
        </div>
    </body>
</html>
