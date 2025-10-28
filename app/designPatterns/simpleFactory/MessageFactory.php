<?php

namespace App\designPatterns\simpleFactory;

class MessageFactory
{
    public function createMessage(string $type,string $to, string $message){
        return match ($type) {
            'SMS' => new SMSMessage($to, $message),
            'email' => new EmailMessage($to, $message),
            'notification' => new PushNotification($to, $message)
        };
    }
}