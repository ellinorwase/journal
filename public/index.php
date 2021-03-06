<?php
  // Load everything needed
  require __DIR__ . '/../vendor/autoload.php';

  // Start a session here
  session_start();

  // Get settings and instantiate the app
  $settings = require __DIR__ . '/../src/settings.php';
  $app = new \Slim\App($settings);

  // Register our dependencies through our container
  $dependencies = require __DIR__ . '/../src/container.php';
  $dependencies($app);

  // Register routes - Dela upp routes i olika filer, istället för det som vi gjorde i övningarna eftermiddag, 14/5
  $login = require __DIR__ . '/../src/routes/login.php';
  $login($app);

  $view = require __DIR__ . '/../src/routes/view.php';
  $view($app);

  $user = require __DIR__ . '/../src/routes/user.php'; // router för user
  $user($app);

  $entry= require __DIR__ . '/../src/routes/entries.php'; // router för entries
  $entry($app);

  // Run app
  $app->run();
