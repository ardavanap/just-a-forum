<?php

namespace App\designPatterns\staticFactory;

class PhysicalProduct implements ProductInterface
{
    public function getType(): void
    {
        echo "it's a physical product!" . "<br>";
    }
}