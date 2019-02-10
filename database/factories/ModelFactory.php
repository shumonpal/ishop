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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'company' => $faker->company,
        'street' => $faker->streetName,
        'zip' => $faker->postcode,
        'state' => $faker->city,
        'country' => $faker->country,
        'phone' => $faker->randomDigit,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('12'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Frontend\Product::class, function (Faker\Generator $faker) {

    return [
        'pdt_name' => $faker->text(15),
        'brand_id' => $faker->numberBetween(1, 5),
        'categories_id' => $faker->numberBetween(1, 5),
        'products_sub_categories_id' => $faker->numberBetween(1, 20),
        'price' => $faker->randomFloat(2, 50, 400),
        'up_price' => $faker->randomFloat(2, 50, 400),
        'short_descp' => $faker->paragraph,
        'descp' => $faker->paragraph,
        'composition' => $faker->randomElement(['new', 'on sale', 'not sale']),
        'is_hot' => $faker->numberBetween(0, 1),
        'is_special' => $faker->numberBetween(0, 1),
        'is_discount' => $faker->numberBetween(10, 50),
        'is_featured' => $faker->numberBetween(0, 1),
        'in_stock' => $faker->numberBetween(10, 200),
        'banner_image' => 'public/images/products/banners/'.$faker->numberBetween(1, 40).'.jpg',
        'warranty_period' => $faker->randomFloat(0, 1)
    ];
});

$factory->define(App\Frontend\ProductsCategory::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'descp' => $faker->paragraph,
    ];
});


$factory->define(App\Frontend\ProductsImage::class, function (Faker\Generator $faker) {

    return [
        'products_id' => $faker->numberBetween(1, 100),
        'image_url'   => 'public/images/products/'.$faker->numberBetween(1, 40).'.jpg',
    ];
});



$factory->define(App\Frontend\ProductsColor::class, function (Faker\Generator $faker) {

    return [
        'products_id' => $faker->numberBetween(1, 100),
        'color'   => $faker->randomElement(['#32fdc0', '#2e64c8 ', '#4b1acd', '#286ecb', '#486ecb']),
    ];
});

$factory->define(App\Frontend\ProductsBrand::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'logo' =>  'public/images/tb'.$faker->numberBetween(1, 5).'.jpg',
    ];
});

$factory->define(App\Frontend\ProductsSubCategory::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
        'products_categories_id' => $faker->numberBetween(1, 5),
        'descp' => $faker->paragraph,
    ];
});


$factory->define(App\Frontend\ProductsReview::class, function (Faker\Generator $faker) {

    return [
        'products_id' => $faker->numberBetween(1, 100),
        'ratings' => $faker->numberBetween(1, 5),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'reviews' => $faker->paragraph,
    ];
});


 