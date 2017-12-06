<?php

$body = $req->getParsedBody();
$result = ['teste' => 'POST', 'body' => $body];

return $res->withJson($result);
