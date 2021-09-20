<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use MovieApp\Subscription;
use MovieApp\User;
use MovieApp\Channel;
use Faker\Generator as Faker;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(User::class)->create()->id;
        },
        'channel_id' => function() {
            return factory(Channel::class)->create()->id;
        },

    ];
});
