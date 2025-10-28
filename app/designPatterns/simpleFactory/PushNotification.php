<?php

namespace App\designPatterns\simpleFactory;

class PushNotification implements MessageInterface
{
    public function __construct(
        private readonly string $to,
        private readonly string $message
    ){}


    public function send(): void
    {
        echo "pushing Notification to $this->to: $this->message" . '<br>';
    }
}