<?php

namespace App\Support\Payment;

use App\Models\Order;
use App\Support\Basket\Basket;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class Transaction
{
    private $request;
    private $basket;

    public function __construct(Request $request, Basket $basket)
    {
        $this->request = $request;
        $this->basket = $basket;
    }

    public function checkout()
    {
        $order = $this->makeOrder();
        dd($order);
    }

    public function makeOrder()
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'code'    => bin2hex(str_random(16)),
            'amount'  => $this->basket->subTotal()
        ]);
        $this->products();
//        $order->products()->attach();

        return $order;
    }

    private function products()
    {
        foreach ($this->basket->all() as $product){
            $products[$product->id] = ['quantity' => $product->quantity];
        }
    }
}
