<?php

return [
  [
    'path' => '/get',
    'method' => 'GET',
    'name' => 'Get example',
    'description' => 'Get example',
    'file' => 'tester/get',
    // 'restricted' => true,
  ],
  [
    'path' => '/post',
    'method' => 'POST',
    'name' => 'Post example',
    'description' => 'Post example',
    'file' => 'tester/post',
    // 'restricted' => true,
  ],
  [
    'path' => '/put',
    'method' => 'PUT',
    'name' => 'Put example',
    'description' => 'Put example',
    'file' => 'tester/put',
    'restricted' => true,
  ],
  [
    'path' => '/delete',
    'method' => 'DELETE',
    'name' => 'Delete example',
    'description' => 'Delete example',
    'file' => 'tester/delete',
    'restricted' => true,
  ],
];
