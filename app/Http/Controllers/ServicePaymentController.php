<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illumninate\Support\Str;

class ServicePaymentController extends Controller
{
    public function confirm(Request $request){
       $data =  $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'  =>  'required|numeric|max:500',
            'subtotal'  =>  'required|numeric' 
        ]);
        $product = Product::find($data[]);
       

        return view('pages.products.confirm', [

        ]);
    }
}
