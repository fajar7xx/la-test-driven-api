<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoListTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('todo-list', \App\Http\Controllers\TodoListController::class);
Route::apiResource('task', TaskController::class);
Route::apiResource('todo-lists.tasks', TodoListTaskController::class)->parameters([
    'todo-lists' => 'todoList'
])->shallow();
