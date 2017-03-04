<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Project::class, function (Faker\Generator $faker) {
    $name = $faker->unique()->words(rand(1, 3), true);

    return [
        'name'        => title_case($name),
        'slug'        => str_slug($name),
        'description' => $faker->optional()->paragraphs(rand(1, 3), true),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    $project = App\Project::inRandomOrder()->first() ?? factory(App\Project::class)->create();

    $user = App\User::inRandomOrder()->first() ?? factory(App\User::class)->create();

    return [
        'user_id'    => $user->id,
        'project_id' => $project->id,
        'title'      => title_case($faker->words(rand(1, 3), true)),
        'body'       => $faker->paragraphs(rand(1, 4), true),
        'teaser'     => $faker->optional()->sentence,
    ];
});
