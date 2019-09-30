<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Fornecedor::class, function (Faker $faker) {
    return [
        'codigo' => 'FOR'.$faker->unique()->numberBetween($min = 0, $max = 999),
        'nome' => $faker->company,
        'endereco' => $faker->address,
        'telefone' => '5568-6967', 
        'ativo' => '1',
    ];
});

$factory->define(App\Models\Produto::class, function (Faker $faker) {
    $img = array(
       0 => 'img/produtos/img2870.jpeg',
       1 => 'img/produtos/img5109.jpeg',
       2 => 'img/produtos/img6540.jpeg',
    );
    return [
        'codigo' => 'PRO'.$faker->unique()->numberBetween($min = 0, $max = 999),
        'nome' => 'Camiseta-'.$faker->numberBetween($min = 10, $max = 100),
        'img' => $img[rand(0, 2)],
        'estoque' => '0',
        'valor' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 999),
        'ativo' => '1'
    ];
});

