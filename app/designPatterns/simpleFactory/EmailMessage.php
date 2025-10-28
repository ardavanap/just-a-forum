<?php

namespace App\designPatterns\simpleFactory;

class EmailMessage implements MessageInterface
{

    public function __construct(
        private readonly string $to,
        private readonly string $message
    ){}


    public function send(): void
    {
        echo "Sending Email to $this->to: $this->message" . '<br>';
    }
}