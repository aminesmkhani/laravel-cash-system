<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Support\Storage\Contracts\StorageInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.products.index',compact('products'));
    }
}
