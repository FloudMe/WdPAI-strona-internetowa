<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefultController');
Routing::get('index','DefultController');
Routing::get('projects','DefultController');
Routing::post('login', 'SecurityController');
Routing::post('addProject', 'ProjectController');
Routing::post('register', 'SecurityController');
Routing::post('animalCategory', 'ProjectController');
Routing::post('foundAnimals', 'ProjectController');

Routing::run($path);