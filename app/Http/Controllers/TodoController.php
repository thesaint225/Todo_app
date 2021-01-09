<?php

namespace App\Http\Controllers;

use App\Models\Todo;
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
        //
        return view('Todos.index')
            // ->with('todos', Todo::all());
            ->with('todos', Todo::orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->completed = false;
        $todo->save();
        return redirect('/todos')->with('success', 'New Todo Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
        return view('Todos.todo')
            ->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {

        return view('Todos.edit')
            ->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
        // $todo = Todo::find($todo);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->completed = false;
        $todo->save();

        return redirect('/todos')->with('success', 'Todo Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        return redirect('/todos')->with('success', 'Todo Deleted Successfully');
    }

    public function completed(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();
        return redirect('/todos')->with('success', 'Todo Has Been completed Successfully');
    }

    public function notcompleted(Todo $todo)
    {

        $todo->completed = false;
        $todo->save();
        return redirect('/todos')->with('success', 'Todo has not been completed');
    }
}
