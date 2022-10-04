<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoListTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function index(TodoList $todoList): Response
    {
        $tasks = $todoList->tasks;
        return response($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function create(TodoList $todoList)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TodoList $todoList)
    {
        // $task = Task::create([
        //     'title' => $request->title,
        //     'todo_list_id' => $todoList->id
        // ]);

        $task = $todoList->tasks()->create([
            'name' => $request->name
        ]);

        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $todoList, Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(TodoList $todoList, Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoList $todoList, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todoList, Task $task)
    {
        //
    }
}
