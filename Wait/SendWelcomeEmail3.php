<?php

use Zenaton\Common\Interfaces\TaskInterface;

class SendWelcomeEmail3 implements TaskInterface
{
    protected $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function handle()
    {
        echo 'Sending welcome email 3 to: '.$this->email.PHP_EOL;
        sleep(rand(1, 3));
        echo '- email 3 sent'.PHP_EOL;
    }
}