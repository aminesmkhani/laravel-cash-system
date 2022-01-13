<?php

namespace App\Support\Payment\Gateways;

use App\Models\Order;
use Illuminate\Http\Request;

class Saman implements GatewayInterface
{

    public function pay(Order $order)
    {
        dd('Saman Pay');
    }

    public function verify(Request $request)
    {

    }

    public function getName(): string
    {
        return 'saman';
    }
}
