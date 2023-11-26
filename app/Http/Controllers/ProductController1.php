<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController1 extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        if (Product::create($request->validated())) {
            return redirect()-> route('products.index')->with('success', 'Added!');
        }
    }

    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', ['product' => $product]);
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->update($request->validated())) {
            return redirect()->route('products.index')->with('success', 'Updated!'); 
        }
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->delete()) {
            return redirect()->route('products.index')->with('success', 'Deleted!');
        }

        return redirect()->route('products.index')->with('error', 'Sorry, unable to delete this!');
    }
}
