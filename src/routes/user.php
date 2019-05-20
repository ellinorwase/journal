<?php

return function ($app) {
  // Register auth middleware
  $auth = require __DIR__ . '/../middlewares/auth.php';

  // Basic protected GET route 
  $app->get('/user/{id}', function ($request, $response, $args) {
    $userID = $args['id'];
    // klassen User i User.php
    $user = new User($this->db);

    return $response->withJson($user->getUserByID($userID));
  })->add($auth);

<<<<<<< HEAD
  $app->get('/users', function ($request, $response) {
    // klassen User i User.php
    $user = new User($this->db);

    return $response->withJson($user->getAllUsers());
  })->add($auth);
=======
  // Hämtar alla användare 
    $app->get('/users', function ($request, $response) {
      // klassen User i User.php
      $user = new User($this->db);
  
      return $response->withJson($user->getAllUsers());
    })->add($auth);
>>>>>>> master
};
