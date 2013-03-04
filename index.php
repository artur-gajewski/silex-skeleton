<?php
$app = require_once __DIR__.'/silex/app.php';

if ($app['debug']) {
    $app->run();
}
else{
   $app['http_cache']->run();
}
