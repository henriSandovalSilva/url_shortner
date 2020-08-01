<?php

return [
  'paths' => [
    'migrations' => __DIR__ . '/database/migrations'
  ],

  'environments' => [
    'default_migration_table' => 'phinxlog',
    'default_database' => 'development',
    'development' => [
      'adapter' => 'pgsql',
      'host' => '192.168.0.7',
      'name' => 'urls_db',
      'user' => 'postgres',
      'pass' => 'admin',
      'port' => 5432
    ]
  ]
];