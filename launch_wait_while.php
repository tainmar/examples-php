<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$user = (object) ['email' => 'user@yoursite.com'];
$workflow = new RetentionWorkflow($user);

// direct synchronous execution
// $workflow->handle();

// execution through Zenaton
$instance = $client->start($workflow);
echo 'launched! '.$instance->getId().PHP_EOL;

sleep(rand(0, 3));
$instance->sendEvent(new UserRetentionEvent());
echo 'event sent! '.PHP_EOL;

sleep(rand(0, 3));
$instance->sendEvent(new UserRetentionEvent());
echo 'event sent! '.PHP_EOL;

sleep(rand(0, 3));
$instance->sendEvent(new UserRetentionEvent());
echo 'event sent! '.PHP_EOL;

sleep(rand(0, 3));
$instance->sendEvent(new UserRetentionEvent());
echo 'event sent! '.PHP_EOL;