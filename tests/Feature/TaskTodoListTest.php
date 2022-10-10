<?php

namespace Tests\Feature;

use App\Models\{TodoList, Task};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTodoListTest extends TestCase
{
    /**
     * test fetch all task of a todo list
     *
     * @return void
     */
    public function test_fetch_all_task_of_a_todo_list()
    {
        $list = $this->createTodoList();
        $task = $this->createTask(true, [
            'todo_list_id' => $list->id
        ]);
       
      
        $response = $this->getJson(route('todo-lists.tasks.index', $list->id))
            ->assertOk()->json();

        

        $this->assertEquals(1, count($response));
        $this->assertEquals($task->title, $response[0]['title']);
        $this->assertEquals($task->todo_list_id, $list->id);
    }

    public function test_store_a_task_for_a_todo_list()
    {
        $list = $this->createTodoList();
        $task = $this->createTask(false);


        $response = $this->postJson(route('todo-lists.tasks.store', $list->id), [
            'title' => $task->title
        ])->assertCreated();

        // dd($response);

        $this->assertDatabaseHas('tasks', [
            'title'        => $task->title,
            'todo_list_id' => $list->id
        ]);
    }

    public function test_update_a_task_from_todo_list()
    {
        $list = $this->createTodoList();
        $task = $this->createTask(true, [
            'todo_list_id' => $list->id
        ]);

        $newtitle = 'update task title for temporary';

        $response = $this->patchJson(route('tasks.update', $task->id), [
            'title' => $newtitle
        ])->assertOk();

        $this->assertDatabaseHas('tasks', [
            'title' => $newtitle
        ]);
    }

    public function test_delete_a_task_from_todo_list()
    {
        $list = $this->createTodoList();
        $task = $this->createTask(true, [
            'todo_list_id' => $list->id
        ]);

        $this->deleteJson(route('tasks.destroy', $task->id))->assertNoContent();

        $this->assertDatabaseMissing('tasks', [
            'title' => $task->title
        ]);
    }

    /**
     * create to list
     *
     * @param boolean $isCreated
     * @param array $args
     * @return void
     */
    private function createTodoList($isCreated = true, $args = [])
    {
        if($isCreated){
            $todoList = TodoList::factory()->create($args);
        }else{
            $todoList = TodoList::factory()->make($args);
        }

        return $todoList;
    }

    /**
     * craeat task
     *
     * @param boolean $isCreated
     * @param array $args
     * @return void
     */
    private function createTask($isCreated = true, $args = [])
    {
        if($isCreated){
            $task = Task::factory()->create($args);
        }else{
            $task = Task::factory()->make($args);
        }

        return $task;
    }
}
