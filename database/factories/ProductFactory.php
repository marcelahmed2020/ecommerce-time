<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use App\Image;
use Faker\Generator as Faker;
$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'short_desc' => $faker->sentence,
        'desc' => $faker->paragraph,
        'price' =>  rand(15,55),
        'purchasing_price' =>  random_int(10,15),
        'featured' =>  random_int(0,1),
        'stock' =>rand(15,55),
        'diffrent_size' =>rand(0,1),
        'code' =>  \Str::random(5),
//        'cat_id' => factory(App\Category::class)
        'cat_id' => rand(8,12)
    ];
});
$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'short_desc' => $faker->sentence,
        'parent' => rand(1,4)

    ];
});$factory->define(\App\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'short_desc' => $faker->sentence,

    ];
});

