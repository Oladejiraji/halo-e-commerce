<?php

require __DIR__ . '\vendor\autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();



$pwd = $_ENV['ADMIN_PASSWORD'];
echo $pwd;