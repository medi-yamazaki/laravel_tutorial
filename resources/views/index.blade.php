@extends('layouts.common')
@section('title', 'Todo　Index')

@section('content')
<div class="title m-b-md">
    Todo
</div>
<form method="POST" action="{{ route('index') }}" class="searchForm">
    {{ csrf_field() }}

    <ul>
        <li><input type="text" class="form-control" id="description" name="description" value="{{ $keyword }}"/></li>
        <li><input type="submit" class="btn btn-primary" value="Sreach"/></li>
    </ul>
</form>

<form class="todoForm">
    @if (count($todos) != 0)

        @if($todos->total() > $todos->perPage())
        <div class="paginationContainer">
            {{$todos->links()}}
        </div>

        @endif

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

    <ul class="btnList">
        <li><a href="/create" class="btn btn-primary">Create</a></li>
    </ul>
</form>

@endsection
