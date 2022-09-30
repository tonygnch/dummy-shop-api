<?php

namespace App\Adapters\Shops;

interface ShopInterface
{
    public function getProducts($page = 1);
}