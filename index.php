<?php
require 'flight/Flight.php';

Flight::route('GET /', function(){
    echo 'Deve retornar um 301 redirect para o endereço original da URL.';
});

Flight::route('POST /users', function(){
    echo 'Cadastra um novo usuário no sistema.';
});

Flight::route('POST /users/:userId/urls', function(){
    echo 'Cadastra uma nova url no sistema.';
});

Flight::route('GET /users/:userId/stats', function(){
    echo 'Retorna estatísticas das urls de um usuário.';
});

Flight::route('DELETE /urls/:id', function(){
    echo 'Apaga uma URL do sistema.';
});

Flight::route('DELETE /users/:userId', function(){
    echo 'Apaga uma URL do sistema.';
});

Flight::route('GET /stats', function(){
    echo 'Retorna estatísticas globais do sistema.';
});

Flight::route('GET /stats:id', function(){
    echo 'Retorna estatísticas de uma URL específica.';
});

Flight::start();
