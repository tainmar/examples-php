<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new CarBookingWorkflow([
    'id' => '12345',
    'customer_id' => '2DER45G',
    'transport' => 'car',
]);

$workflow->dispatch();
