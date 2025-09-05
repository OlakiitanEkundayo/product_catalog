<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 4;

        $products = Product::query()
        ->when($keyword, function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('category', 'LIKE', "%{$keyword}%");
            });
        })
        ->latest()
        ->paginate($perPage);

        return view('products.index', compact('products'));

    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
        ]);

        $file_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $file_name);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $file_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product added successfully');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('products.edit', ['product'=>$product]);
    }

    public function update(Request $request, Product $product){

        $request->validate([
            'name' => 'required',
        ]);

        $file_name = $request->hidden_product_image;

        if($request->image !== ''){
            $file_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $file_name);

        }

        $product = Product::find($request->hidden_id);

         Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $file_name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category' => $request->category,
        ]);

        return redirect()->route('products.index')->with('success', 'Product has been updated successfully');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $image_path = public_path()."/images/";
        $image = $image_path. $product->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $product->delete();
        return redirect('products')->with('success', 'Product deleted');
    }
}
