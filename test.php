<?php

require __DIR__ . '\vendor\autoload.php';
// require("../vendor/autoload.php");
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// $pwd = getenv('ADMIN_PASSWORD');


$pwd = $_ENV['ADMIN_PASSWORD'];
echo $pwd;