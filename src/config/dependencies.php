<?php

// Configurações
$configuration = [
  'settings' => [
    'displayErrorDetails' => $settings['settings']['slim']['debug'],
    'determineRouteBeforeAppMiddleware' => true,
  ],
];

// Container
$container = new \Slim\Container($configuration);

// Doctrine - Database
// $conn = $settings['settings']['db'];
// $container['db'] = function ($container) use ($conn) {
//   $db = \Doctrine\DBAL\DriverManager::getConnection($conn, new \Doctrine\DBAL\Configuration());
//   return $db;
// };

// Register component on container
$container['view'] = function ($container) use ($settings) {
  $view = new \Slim\Views\Twig($settings['settings']['twig']['views'], [
    'debug' => $settings['settings']['twig']['debug'],
    'cache' => $settings['settings']['twig']['cache']
  ]);

  // Instantiate and add Slim specific extension
  $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
  $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

  return $view;
};

// Create app
$app = new \Slim\App($container);
