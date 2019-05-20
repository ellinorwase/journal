<?php

return function ($app) {
  // Register auth middleware
  $auth = require __DIR__ . '/../middlewares/auth.php';

  // Hämtar alla inlägg  
  $app->get('/entries', function ($request, $response) {
    $entries = new Entry($this->db);
    return $response->withJson($entries->getAllEntry());
  })->add($auth);
  // hämtar ett inlägg
  $app->get('/entries/1', function ($request, $response) {
    $entries = new Entry($this->db);
    return $response->withJson($entries->getOneEntry());
  })->add($auth);

};
