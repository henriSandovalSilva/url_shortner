<?php

use Flight;

class Model {

    public $conn;

    function __construct() {
        $this->conn = new PDO("pgsql:host={$_ENV['DB_HOST']};port={$_ENV['DB_PORT']};dbname={$_ENV['DB_NAME']};user={$_ENV['DB_USER']};password={$_ENV['DB_PASS']};");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}