<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_ENV['ENVIRONMENT'] === 'development') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}