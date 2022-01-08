<?php

namespace App\Http\Controllers;

use App\Exceptions\QuantityExceededException;
use App\Models\Product;
use App\Support\Basket\Basket;
use App\Support\Payment\Transaction;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    private $basket;
    private $transaction;

    public function __construct(Basket $basket, Transaction $transaction)
    {
        $this->middleware('auth')->only(['checkoutform','checkout']);
        $this->basket = $basket;
        $this->transaction = $transaction;
    }

    public function add(Product $product)
    {
        try {
            $this->basket->add($product,1);

            return back()->with('success', 'محصول با موفقیت به سبد خرید اضافه شد');
        }catch (QuantityExceededException $e){
            return back()->with('error', 'محصول مورد نظر به تعدادی که شما درخواست داده اید موجود نیست');
        }
    }


    public function index()
    {
        $items = $this->basket->all();
        return view('frontend.basket.basket',compact('items'));
    }


    public function update(Request $request, Product $product)
    {
        $this->basket->update($product, $request->quantity);
        return back();
    }


    public function checkoutform()
    {
        $items = $this->basket->all();
        return view('frontend.basket.checkout',compact('items'));
    }

    public function checkout(Request $request)
    {
        $this->validateForm($request);
      $order =   $this->transaction->checkout();

      // if message return with helper function define :)
      return redirect()->route('home');
    }

    public function validateForm($request)
    {
        $request->validate([
           'method' => ['required'],
            'gateway' => ['required_if:method,online']
        ]);
    }
}
