<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
  'paths' => [
    'migrations' => __DIR__ . '/database/migrations'
  ],

  'environments' => [
    'default_migration_table' => 'phinxlog',
    'default_database' => 'development',
    'development' => [
      'adapter' => 'pgsql',
      'host' => $_ENV['DB_HOST'],
      'name' => $_ENV['DB_NAME'],
      'user' => $_ENV['DB_USER'],
      'pass' => $_ENV['DB_PASS'],
      'port' => $_ENV['DB_PORT']
    ]
  ]
];