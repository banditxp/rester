<?php

return [
  'settings' => [
    'app' => [
      'charset'  => 'UTF-8',
      'timezone' => 'America/Sao_Paulo',
    ],
    'slim' => [
      'mode'  => 'development',
      'debug' => 1,
    ],
    // 'db' => [
    //   'driver'     => 'pdo_mysql',
    //   'host'       => $_ENV['DB_HOST'],
    //   'user'       => $_ENV['DB_USER'],
    //   'password'   => $_ENV['DB_PASS'],
    //   'dbname'     => 'dasher',
    //   'persistent' => true,
    //   'charset'    => 'utf8',
    // ],
    'twig' => [
      'debug' => 1,
      'views' => "src/views",
      'cache' => "src/cache",
    ],
  ],
];
