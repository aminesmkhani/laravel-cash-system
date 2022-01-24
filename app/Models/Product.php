<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    # Check Number Product

    public function hasStock(int $quantity)
    {
        return $this->stock >= $quantity;
    }

    public function decrementStock(int $count)
    {
        return $this->decrement('stock', $count);
    }

}
