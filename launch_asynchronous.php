<?php

require __DIR__.'/autoload.php';
require __DIR__.'/client.php';

$workflow = new SendInvitationsWorkflow(
    ['Gilles', 'Julien', 'Oussama', 'Alice', 'Charlotte', 'Balthazar', 'Annabelle', 'Louis']
);

$workflow->dispatch();
