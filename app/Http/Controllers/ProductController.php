<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;




class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'threshold_quantity' => 'required|integer|min:1',
            'aisle_id' => 'required|exists:aisles,id',
            'category_id' => 'required|exists:categories,id',
            'is_popular' => 'boolean',
            'is_promotion' => 'boolean',
            'promotion_price' => 'nullable|numeric|min:0',
        ]);

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            
            'threshold_quantity' => 'sometimes|required|integer|min:1',
            'aisle_id' => 'sometimes|required|exists:aisles,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'is_popular' => 'boolean',
            'is_promotion' => 'boolean',
            'promotion_price' => 'nullable|numeric|min:0',
        ]);

        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product removed']);
    }
}
