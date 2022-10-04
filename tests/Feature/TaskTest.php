<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * test fetch all task of a todo list
     *
     * @return void
     */
    public function test_fetch_all_tasks_of_a_todo_list(): void
    {
        $task = $this->createTask();

        $response = $this->getJson('api/task')->assertOk()->json();
        
        $this->assertEquals(1, count($response));
        $this->assertEquals($task->title, $response[0]['title']);
    }

    /**
     * test store a task for todo list
     *
     * @return void
     */
    public function test_store_a_task_for_todo_list(): void
    {
        $task = $this->createTask(false);
        $response = $this->postJson('api/task', [
            'title' => $task->title
            ])->assertCreated();
        
        $this->assertDatabaseHas('tasks', ['title' => $task->title]);
    }

    /**
     * test delete a task
     *
     * @return void
     */
    public function test_delete_a_task(): void
    {
        $task = $this->createTask();
        $response = $this->deleteJson('api/task/' . $task->id)
            ->assertNoContent();

        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);
    }


    /**
     * create task
     *
     * @param boolean $created
     * @param array $args
     * @return object
     */
    private function createTask($created=true, $args= []): object
    {
        // return Task::factory()->create($args);
        if($created){
            $task = Task::factory()->create($args);
        }else{
            $task = Task::factory()->make($args);
        }

        return $task;
    }
}
