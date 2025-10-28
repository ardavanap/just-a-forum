<?php

namespace App\designPatterns\simpleFactory;

class SMSMessage implements MessageInterface
{

    public function __construct(
        private readonly string $to,
        private readonly string $message
    ){}

    public function send(): void
    {
        echo "Sending SMS to $this->to: $this->message" . '<br>';
    }
}