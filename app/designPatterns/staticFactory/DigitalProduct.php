<?php

namespace App\designPatterns\staticFactory;

class DigitalProduct implements ProductInterface
{

    public function getType(): void
    {
        echo "it's a Digital product " . "<br>";
    }
}