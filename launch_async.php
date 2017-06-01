<?php

require_once __DIR__.'/autoload.php';

use Tasky\Client;

$client = new Client($app_id, $api_token, $app_env);

$w = $client->start(new AsyncFlow());
echo 'launched! '.$w->getId().PHP_EOL;
