<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        // return all products
    }

    public function create(){
        // return view to create product
    }

    public function show(Product $product){
        // Return a specific product
    }

    public function store(Request $request){
        // add a new product
    }

    public function update(Request $request, Product $product){
        // update a given product
    }

    public function destroy(Product $product){
        // Destroy a given product
    }
}
