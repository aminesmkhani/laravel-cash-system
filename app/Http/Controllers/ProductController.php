<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Support\Storage\Contracts\StorageInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $sessionStorage = resolve(StorageInterface::class);
        $sessionStorage->set('product',5);
        $sessionStorage->set('item',5);
        $sessionStorage->set('size',2);
        dd($sessionStorage->all());
        $products = Product::all();
        return view('frontend.products.index',compact('products'));
    }
}
