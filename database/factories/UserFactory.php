<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Lead;
use App\LeadScore;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Lead::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'owner'=>'Admin',
        'mobile'=>6785434567,
        'stage'=>1,
        'user_id'=>1
    ];
});


$factory->define(LeadScore::class, function (Faker $faker) {
    return [
        'lead_id' => function () {
            return factory('App\Lead')->create()->id;
        },
        'message' => 'hy berry',
        'point'=>'Admin'
    ];
});

$factory->define(Account::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'country' => 'Scotland',
        'Address'=>'William Pearl',
        'number'=>'6785434567',
        'industry'=>'Armor',
        'business'=>'Sales'
    ];
});

$factory->define(App\Task::class, function (Faker $faker) {
    return [
         'lead_id'=>function () {
            return factory('App\Lead')->create()->id;
        },
        'body' => $faker->sentence,
        'completed'=>false
    ];
});
