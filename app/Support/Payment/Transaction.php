<?php

namespace App\Support\Payment;

use App\Models\Order;
use App\Models\Payment;
use App\Support\Basket\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $payment = $this->makePayment($order);
        if ($payment->isOnline()){
           dd('online');
        }
        $this->basket->clear();
        return $order;
    }

    public function makeOrder()
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'code'    => bin2hex(Str::random(16)),
            'amount'  => $this->basket->subTotal()
        ]);

        $order->products()->attach($this->products());

        return $order;
    }

    public function makePayment($order)
    {
        return Payment::create([
            'order_id' => $order->id,
            'method'   => $this->request->method(),
            'amount'   => $order->amount
        ]);
    }

    private function products()
    {
        foreach ($this->basket->all() as $product){
            $products[$product->id] = ['quantity' => $product->quantity];
        }

        return $products;
    }
}
