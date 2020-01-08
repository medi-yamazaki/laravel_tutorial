<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo　Index</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref">
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
                    Todo
                </div>

                <form class="todoForm">
                    <!-- @foreach ($users as $user)
                        {{ $user->name }}
                    @endforeach -->
                    @if (count($todos) != 0)
                        <ul class="todoList">
                            @foreach ($todos as $todo)
                            <li class="{{$todo->status_class}}">
                                <dl>
                                    <dt>
                                        <a href="/edit/{{$todo->id}}">
                                            <span>{{$todo->title}}</span>
                                        </a>

                                    </dt>
                                    <dd>
                                        <div class="status">{{$todo->status_label}}</div>
                                        <div class="editLink">
                                            <a href="/edit/{{$todo->id}}">
                                                <span>Edit</span>
                                            </a>
                                        </div>
                                    </dd>
                                </dl>
                                <span class="upDate">最終更新日時：{{ $todo->updated_at->format("Y年m月d日 H:i") }}</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="emptyTxt">表示するTodoリストはありません</p>
                    @endif
                    <a href="/create" class="btn btn-primary">Create</a>
                </form>

            </div>
        </div>
    </body>
</html>
