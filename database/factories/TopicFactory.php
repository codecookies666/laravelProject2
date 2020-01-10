<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {

    $sentence = $faker->sentence();

    //随机一个月以内的时间
    $uodated_at = $faker->dateTimeThisMonth();

    //传参为生成最大时间不超过，因为创建时间需要永远比更改时间更早
    $created_at = $faker->dateTimeThisMonth($uodated_at);

    return [
        'title' => $sentence,
        'body' => $faker->text(),
        'excerpt' => $sentence,
        'created_at' => $created_at,
        'updated_at' => $uodated_at,
    ];
});
