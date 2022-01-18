<?php

namespace App\Http\Controllers;

use App\Support\Payment\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $transaction ;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function verify(Request $request)
    {
       return $this->transaction->verify()
           ? $this->sendSuccessResponse()
           : $this->sendErrorResponse();
    }

    private function sendErrorResponse()
    {
        return redirect()->route('home')->with('error','مشکلی در هنگام صبت سفارش به وجود آمده است');
    }
    private function sendSuccessResponse()
    {
        return redirect()->route('home')->with('success','سفارش شما با موفقیت ایجاد شد');
    }

}
