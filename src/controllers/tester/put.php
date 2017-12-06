<?php

$body = $req->getParsedBody();
$result = ['teste' => 'PUT', 'body' => $body];

return $res->withJson($result);
