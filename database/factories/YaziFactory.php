<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Yazi;
use Faker\Generator as Faker;

$factory->define(Yazi::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'description' => $faker->paragraph,
        'status' => $faker->numberBetween(0,1),
        'owner_id' => function(){
            return factory(App\User::class)->create()->id;
        }
    ];
});
