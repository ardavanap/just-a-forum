<?php

namespace App\designPatterns\staticFactory;

class client
{
    public static function run()
    {
        $productFactory = ProductFactory::create('digital');
        $productFactory->getType();

        $productFactory = ProductFactory::create('physical');
        $productFactory->getType();
    }

}