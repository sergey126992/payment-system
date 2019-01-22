<?php

use Faker\Generator as Faker;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Models\Service::class, function (Faker $faker) {
    return [
        'company_id' => $faker->unique()->randomDigit,
        'title' => $faker->unique()->title,
        'url' => $faker->unique()->url,
        'description' => $faker->text(20),
        'secret_key' => str_random(10),
        'url_status' => 1,
        'url_check' => 1,
        'signature' =>  str_random(32),
    ];
});
