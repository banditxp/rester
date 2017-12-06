<?php

$api = require __DIR__ . '/api.php';

// Options
$app->options('/{routes:.+}', function ($request, $response, $args) {
  return $response;
});

// CORS
$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
    ->withHeader('Access-Control-Allow-Origin', $_SERVER['HTTP_ORIGIN'])
    // ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Credentials', 'true')
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Services list
$app->get('/', function($req, $res, $args) use ($api) {
  $result['api'] = $api;
  $result['method'] = [
    'GET'    => 'blue',
    'POST'   => 'green',
    'PUT'    => 'black',
    'DELETE' => 'red',
  ];

  return $this->view->render($res, 'index.twig', $result);
});

// PHP Info
// $app->get('/info', function($req, $res, $args) {
//   return phpinfo();
// });

// API services
foreach ($api as $key => $value) {
  $app->map([$value['method']], $value['path'], function($req, $res, $args) use ($value, $settings) {
    if ($value['restricted']) {
      // Put your restriction check
      // if (empty($_SESSION['user'])) {
      //   return $res->withJson(['errors' => 'No user logged in'], 401);
      // }
    }

    try {
      $return = include __DIR__ . '/../controllers/' . $value['file'] . '.php';
    } catch (Exception $e) {
      $return = $res->withJson(['errors' => [$e->getMessage()]], 422);
    }
    return $return;
  });
}
