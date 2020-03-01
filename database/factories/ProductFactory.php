<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'description' => $faker->word,
        'price' => $faker->randomFloat(2, 0, 10000), 
        'image' => $faker->randomElement(['/asset/images/product_1.jpg', '/asset/images/product_2.jpg', '/asset/images/product_3.jpg', '/asset/images/product_4.jpg', '/asset/images/product_5.jpg', '/asset/images/product_6.jpg', '/asset/images/product_7.jpg', '/asset/images/product_8.jpg', '/asset/images/product_9.jpg'])
    ];
});
