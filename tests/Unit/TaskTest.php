<?php

namespace Tests\Unit;

use App\Task;
use App\TaskCategory;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Carbon\Carbon;

class TaskTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function aTaskCanBeCreated()
    {
        $task = new Task;

        $taskCategoryIds = TaskCategory::all()->pluck('id')->toArray();

        $dueDate = new Carbon($this->faker->date());

        $task->task_category_id = $this->faker->randomElement($taskCategoryIds);
        $task->title = $this->faker->name;
        $task->description = $this->faker->realText();
        $task->due_date = $dueDate->format('d/m/Y');
        $task->archived = $this->faker->numberBetween(0, 1);

        $task->save();

        $this->assertDatabaseHas('tasks', [
            'task_category_id' => $task->task_category_id,
            'title' => $task->title,
            'description' => $task->description,
            'due_date' => $task->due_date->format('Y-m-d'),
            'archived' => $task->archived
        ]);
    }

    /** @test */
    public function aTaskCanBeUpdated()
    {
        $task = factory(Task::class)->create();

        $taskCategoryIds = TaskCategory::all()->pluck('id')->toArray();

        $dueDate = new Carbon($this->faker->date());

        $task->task_category_id = $this->faker->randomElement($taskCategoryIds);
        $task->title = $this->faker->name;
        $task->description = $this->faker->realText();
        $task->due_date = $dueDate->format('d/m/Y');
        $task->archived = $this->faker->numberBetween(0, 1);

        $task->save();

        $this->assertDatabaseHas('tasks', [
            'task_category_id' => $task->task_category_id,
            'title' => $task->title,
            'description' => $task->description,
            'due_date' => $task->due_date->format('Y-m-d'),
            'archived' => $task->archived
        ]);
    }

    /** @test */
    public function aTaskCanBeDeleted()
    {
        $task = factory(Task::class)->create();

        $task->delete();

        $this->assertSoftDeleted('tasks', ['id' => $task->id]);
    }
}
