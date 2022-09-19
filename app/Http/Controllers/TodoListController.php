<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListStoreRequest;
use App\Http\Requests\TodoListUpdateRequest;
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
    public function update(TodoListUpdateRequest $request, TodoList $todo_list)
    {
        $todo_list->name = $request->name;
        $todo_list->save();

        return response($todo_list);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodoList  $todoList
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodoList $todo_list)
    {
        $todo_list->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
