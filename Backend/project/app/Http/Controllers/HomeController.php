<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function show(Request $req){
        $product =new Product();
        $products = $product->paginate(3);
        return view('welcome')->with($products);
    }
}
