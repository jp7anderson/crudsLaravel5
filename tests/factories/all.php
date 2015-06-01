<?php

$factory('App\User', [
	'username' => $faker->name,
	'email' => $faker->email,
	'password' => bcrypt('password')
]);

$factory('App\Article', [
	'title' => 'titulo teste',
	'body' => 'Body de teste',
	'published_at' => date('Y-m-d')
]);

$factory('App\Tag', [
	'name' => 'Nova Tag'
]);