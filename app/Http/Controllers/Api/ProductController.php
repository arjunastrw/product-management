<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi data
        $request->validate([
            'name_product' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'brand' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        $product = new Product();
        $product->name_product = $request->name_product;
        $product->stock = $request->stock;
        $product->brand = $request->brand;
        $product->user_id = auth()->id(); // Atur user_id sesuai dengan pengguna yang sedang login
        $product->save();

        // Redirect ke halaman dashboard atau tampilkan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('dashboard')->with('success', 'Product has been deleted successfully');
    }
}
