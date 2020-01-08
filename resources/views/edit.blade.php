<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo　Edit</title>

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
                    Edit
                </div>

                <form action="{{ route('edit', ['id' => $todo->id]) }}" method="POST" class="todoForm">
                    {{ csrf_field() }}

                    <dl class="formDl">
                        <dt>タイトル</dt>
                        <dd>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?? $todo->title }}"/>
                            @error('title')
                            <small class="form-text textError">{{$message}}</small>
                            @enderror
                        </dd>

                        <dt>内容</dt>
                        <dd>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?? $todo->description }}</textarea>
                            <small class="form-text textError"></small>
                        </dd>
                    </dl>

                    <div class="statusEdit">
                        <dl>
                            <dt>ステータス</dt>
                            <dd>
                                <div class="selectStatus">
                                    <select class="form-control" name="status" id="status">
                                        @foreach(\App\Todo::STATUS as $key => $val)
                                            <option value="{{ $key }}"{{ $key == old('status', $todo->status) ? ' selected' : '' }}>{{ $val['label'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <ul class="dateStatus">
                                    <li>作成日：{{ $todo->created_at->format("Y年m月d日 H:i") }}</li>
                                    <li>更新日：{{ $todo->updated_at->format("Y年m月d日 H:i") }}</li>
                                </ul>
                            </dd>
                        </dl>
                    </div>

                    <ul class="btnList">
                        <li><a href="{{ route('index') }}" class="btn btn-light">Back</a></li>
                        <li><input type="submit" class="btn btn-primary" value="Submit"/></li>
                        <li><input type="submit" name="destroy" class="btn btn-danger" value="Delete"/></li>
                    </ul>
                </form>

            </div>
        </div>
    </body>
</html>
