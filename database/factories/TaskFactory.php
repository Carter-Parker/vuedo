<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\TaskCategory;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $taskCategoryIds = TaskCategory::all()->pluck('id')->toArray();

    return [
        'task_category_id' => $faker->randomElement($taskCategoryIds),
        'title' => $faker->name,
        'description' => $faker->realText(),
        'due_date' => $faker->date('d/m/Y'),
        'archived' => $faker->boolean()
    ];
});
