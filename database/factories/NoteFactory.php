<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use App\User;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'user_id'           =>  User::all()->random()->id,
        'title'             =>  $faker->words($nb = rand(1, 4), $asText = true),
        'note' 				=> 	$faker->paragraph(rand(20, 50)),
        'language' 		    => 	'plain',
        'visible_mode' 		=> 	$faker->randomElement(['public', 'private']),
        'slug'		        =>	rand(100, 9999) . '-' . $faker->unique()->sentence(1),
    ];
});
