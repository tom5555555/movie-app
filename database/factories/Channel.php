<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use MovieApp\Channel;
use Faker\Generator as Faker;
use MovieApp\User;

$factory->define(Channel::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'description' => $faker->sentence(30)
    ];
});
