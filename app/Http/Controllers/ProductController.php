<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //show form create
        $unit = Unit::all();
        $category = Category::all();
        return view('product.add', compact('unit', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|min:2|max:20',
            'kategori' => 'required',
            'jumlah' => 'nullable|integer|min:1|max:100',
            'satuan' => 'required'
        ]);

        $random = Str::random(6);
        // $validated['kode'] = $random;

        Product::create([
            "nama" => $validated['nama'],
            "kd_kategori" => $validated['kategori'],
            "kd_satuan" => $validated['satuan'],
            "jumlah" => $validated["jumlah"],
            "kode" => $random,
            "id_user_insert" => auth()->user()->id
        ]);

        return response()->redirectTo('/product')->with('success', 'Product berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $category = Category::all();
        $unit = Unit::all();

        return view('product.edit', compact('product', 'unit', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'kode' => 'required|string|min:6|max:6|unique:tabel_barang,kode,' . $product->id,
            'nama' => 'required|string|min:2|max:20',
            'kategori' => 'required',
            'jumlah' => 'nullable|integer|min:1|max:100',
            'satuan' => 'required'
        ]);

        $product->update([
            "kode" => $validated['kode'],
            "nama" => $validated['nama'],
            "kd_kategori" => $validated['kategori'],
            "kd_satuan" => $validated['satuan'],
            "jumlah" => $validated["jumlah"],
            "id_user_insert" => auth()->user()->id
        ]);

        return response()->redirectTo('/product')->with('success', 'Product berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
