<?php

namespace App\Http\Controllers;

use App\Todo;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\CreateTodo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DB Users
        $users = User::all();
        $todos = Todo::all();
        return view('index', [
            'users' => $users,
            'todos' => $todos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('create');
    }

    public function create(CreateTodo $request)
    {
        $todo = new Todo();

        $todo->title = $request->title;
        $todo->description = $request->description;
        $request->session()->regenerateToken();
        $todo->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(int $todo_id)
    {
        //DB Users
        $todo = Todo::find($todo_id);
        return view('edit', [
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(CreateTodo $request, int $todo_id)
    {
        $todo = Todo::find($todo_id);
        if($request->input('destroy')) {
            $this->destroy($todo_id);
        } else {
            $todo->title = $request->title;
            $todo->description = $request->description;
            $todo->status = $request->status;
            $request->session()->regenerateToken();
            $todo->save();
        }
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $todo_id)
    {
        $todo = Todo::findOrFail($todo_id);
        $todo->delete();
    }

}
