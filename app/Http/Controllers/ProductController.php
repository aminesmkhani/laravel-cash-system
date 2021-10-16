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
        $sessionStorage->set('item',5);
        dd(session()->all());
        $products = Product::all();
        return view('frontend.products.index',compact('products'));
    }
}
