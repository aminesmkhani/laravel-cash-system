<?php

namespace App\Support\Basket;

use App\Exceptions\QuantityExceededException;
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

        if ($this->has($product)){
            $quantity = $this->get($product)['quantity'] + $quantity;
        }

        $this->update($product, $quantity);


    }


    public function update(Product $product, int $quantity)
    {

        if (!$product->hasStock($quantity)){
            throw new QuantityExceededException();
        }

        $this->storage->set($product->id, [
            'quantity' => $quantity
        ]);
    }


    public function get(Product $product)
    {
        return $this->storage->get($product->id);
    }


    public function has(Product $product)
    {
        return $this->storage->exists($product->id);
    }
}
