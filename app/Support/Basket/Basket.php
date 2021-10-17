<?php

namespace App\Support\Basket;

use App\Models\Product;
use App\Support\Storage\Contracts\StorageInterface;

class Basket
{
    private $storage;


    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }


    public function add(Product $product, int $quantity)
    {
        $this->storage->set($product->id, [
           'quantity' => $quantity
        ]);
    }
}
