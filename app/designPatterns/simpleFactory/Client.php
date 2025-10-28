<?php

namespace App\designPatterns\simpleFactory;

class Client
{
    public static function run(): void{
        $messageFactory = new MessageFactory();
        $sendMessage = $messageFactory->createMessage('email','Ali', 'In payam baraye teste');
        $sendMessage->send();

        $sendMessage = $messageFactory->createMessage('SMS','Ali', 'In payam baraye teste');
        $sendMessage->send();

        $sendMessage = $messageFactory->createMessage('notification','Ali', 'In payam baraye teste');
        $sendMessage->send();
    }
}