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
}
