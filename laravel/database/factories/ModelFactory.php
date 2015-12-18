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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Collection::class, function ($faker) {
    return [
        'name' => ucfirst($faker->word),
        'sku'  => $faker->randomNumber(2),
    ];
});

$factory->define(App\Subcollection::class, function ($faker) {
    return [
        'name' => ucfirst($faker->word),
        'sku'  => $faker->randomNumber(2),
    ];
});


$factory->define(App\Model::class, function ($faker) {
    return [
        'name' => ucfirst($faker->word),
        'sku'  => $faker->randomNumber(2),
    ];
});

$factory->define(App\ModelItem::class, function ($faker) {
    return [
        'name' => ucfirst($faker->word),
        'description' => $faker->realText(140),
        'sku'  => ucfirst($faker->randomLetter).$faker->numberBetween(10, 99),
    ];
});

$factory->define(App\Color::class, function ($faker) {
    return [
        'name' => ucfirst($faker->word),
        'sku'  => $faker->randomNumber(2),
    ];
});

$factory->define(App\Size::class, function ($faker) {
    return [
        'name' => ucfirst($faker->word),
        'sku'  => $faker->randomNumber(2),
    ];
});

$factory->define(App\ColorPhoto::class, function ($faker) {
    return [
        'photo'  => $faker->image('/tmp', 200, 350, 'fashion'),
    ];
});


$factory->define(App\Set::class, function($faker) {
    return [
        'name' => ucfirst($faker->word),
        'description' => $faker->realText(140)
    ];
});


$factory->define(App\SetPhoto::class, function($faker) {
    return [
        'photo'  => $faker->image('/tmp', 200, 350, 'fashion'),
    ];
});
