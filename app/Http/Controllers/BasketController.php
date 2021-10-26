<?php

namespace App\Http\Controllers;

use App\Exceptions\QuantityExceededException;
use App\Models\Product;
use App\Support\Basket\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->middleware('auth')->only(['checkoutForm']);
        $this->basket = $basket;
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
        return view('frontend.basket.checkout');
    }
}
