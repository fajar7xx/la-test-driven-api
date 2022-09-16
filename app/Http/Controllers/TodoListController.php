<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListStoreRequest;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = TodoList::all();
//        return response()->json([
//            "data" => "data"
//        ]);
        return response($lists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TodoListStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoListStoreRequest $request)
    {
        $list = TodoList::create([
            'name' => $request->name
        ]);

        return response($list, Response::HTTP_CREATED);
    }

    /**
     *
     * Display the specified resource.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function show(TodoList $todo_list)
    {
        return response($todo_list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodoList $todoList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todoList)
    {
        //
    }
}
