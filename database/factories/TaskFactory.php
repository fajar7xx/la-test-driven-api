<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * protected model
     *
     * @var [type]
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'todo_list_id' => function(){
                return TodoList::factory()->create()->id;
            },
        ];
    }
}
