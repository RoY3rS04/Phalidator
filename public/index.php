<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Royers\Phalidator\App\User;
use Royers\Phalidator\Validation\Validator;

$name = $_GET['u_name'];

$user = new User($name);

Validator::validate(new ReflectionClass(User::class), $user);
