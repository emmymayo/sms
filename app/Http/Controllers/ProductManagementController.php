<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class ProductManagementController extends Controller
{
    public function index(){
        $products = Product::paginate(15);

        return view('pages.products.manage.index', [
            'products'  =>  $products
        ]);
    }

    public function create(){
        Gate::authorize('admin-only');

        $price_types = Product::getPriceTypes();
        $product_types = Product::getProductTypes();

        return view('pages.products.manage.add', [
            'price_types' => $price_types,
            'product_types' => $product_types,
            'variable_price_key' => Product::PRICE_VARIABLE,
        ]);
    }

    public function edit(Product $product){
        Gate::authorize('admin-only');

        $price_types = Product::getPriceTypes();
        $product_types = Product::getProductTypes();

        return view('pages.products.manage.edit', [
            'product' => $product,
            'price_types' => $price_types,
            'product_types' => $product_types,
            'variable_price_key' => Product::PRICE_VARIABLE,
        ]);
    }

    public function store(Request $request){
        Gate::authorize('admin-only');

        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'price'         => ['nullable', 'numeric'],
            'price_type'    => Rule::in([Product::PRICE_FIXED, Product::PRICE_VARIABLE]),
            'product_type'  => Rule::in([Product::PRODUCT_FEES, Product::PRODUCT_STATIONERIES, Product::PRODUCT_OTHERS])
        ]);

        return Product::create($data) ? back()->with('action-success', 'Product added successfully')
                                      : back()->with('action-failed', 'Unable to add product at the moment');
        

    }

    public function update(Request $request, Product $product){
        Gate::authorize('admin-only');

        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string',
            'price'         => ['nullable', 'numeric'],
            'price_type'    => Rule::in([Product::PRICE_FIXED, Product::PRICE_VARIABLE]),
            'product_type'  => Rule::in([Product::PRODUCT_FEES, Product::PRODUCT_STATIONERIES, Product::PRODUCT_OTHERS])
        ]);

        return $product->update($data) ? redirect('/product-management')->with('action-success', 'Product updated successfully')
                                      : back()->with('action-failed', 'Unable to edit product at the moment');
        

    }

    public function destroy(Product $product){
        Gate::authorize('admin-only');
        return $product->delete() ? back()->with('action-success', 'Product deleted successfully.')
                                  : back()->with('action-failed', 'Unable to delete product at the moment.');
    }
}
