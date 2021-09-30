<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    $user = Factory(User::class)->create();
    
    return [
        'user_id' => $user->id,
        'title'=> $faker->text(10),
        'description'=> $faker->text(),
        'is_completed' => rand(0, 1),
        'date' => $faker->dateTime(),
        'task_start' => $faker->dateTime(),
        'task_end' => $faker->dateTime(),
    ];
});
