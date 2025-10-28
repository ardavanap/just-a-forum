<?php

namespace App\designPatterns\staticFactory;

use InvalidArgumentException;

class ProductFactory
{
    public static function create(string $type){
        return match($type) {
            'physical' => new PhysicalProduct(),
            'digital' => new DigitalProduct(),
            default => 'bad argument' // throw new ...
        };
    }
}