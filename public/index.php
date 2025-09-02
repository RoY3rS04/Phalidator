<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Royers\Phalidator\App\User;
use Royers\Phalidator\Validation\Validator;

$name = $_GET['u_name'];

$user = new User($name);

$tuple = Validator::validate($user);

if (!$tuple->first) {
    echo "<pre>";
    var_dump($tuple->second);
    echo "</pre>";
} else {
    echo "Validation successfull";
}
