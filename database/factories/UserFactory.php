<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\CashReceipt::class, function (Faker $faker) {
    return [
        'box_number' => $faker->numberBetween(10000, 40000),
        'we_received' => $faker->name(10),
        'address' => $faker->address,
        'city' => $faker->text(10),
        'document_type' => $faker->text(5),
        'document_number' => $faker->numberBetween(10000, 40000),
        'date' => $faker->date(),
        'value' => $faker->numberBetween(10000, 40000),
        'value_in_letters' => $faker->text(10),
        'description' => $faker->text(50) 
    ];
});
