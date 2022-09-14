<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    /**
     * test fetch to do listA
     *
     * @return void
     */
    public function test_fetch_all_todo_lists()
    {
//        TodoList::create([
//            'name' => 'daftar list yang akan di buat'
//        ]);

        $lists = TodoList::factory()->create([
            'name' => 'my list'
        ]);
//        dd($lists);

        $response = $this->getJson('api/todo-list');

        $this->assertEquals(1, count($response->json()));
        $this->assertEquals('my list', $response->json()[0]['name']);
    }


    public function test_fetch_todo_list()
    {
        $list = TodoList::factory()->create();

        $response = $this->getJson('api/todo-list/' . $list->id);

        $response->assertOk();
        $this->assertEquals($response->json()['name'], $list->name);
    }
}
