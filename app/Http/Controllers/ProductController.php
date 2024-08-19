<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function index()
    {
        $products = Products::paginate(12);
        return view('index', compact('products'));
    }
    public function indexAdmin()
    {
        $products = Products::paginate(5);
        return view('admin', compact('products'));
    }

    public function create()
    {
        return view('newProduct');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|min:1',
            'cover' => 'required|image',
            'description' => 'nullable'
        ]);

        $cover = $data['cover'];
        $path = $cover->store('covers', 'public');
        $data['cover'] = $path;

        Products::create($data);
        
        return Redirect::route('admin.index');
    }

    public function show(string $id)
    {
        $product = Products::findOrFail($id);
        
        return view('product', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        return view('editProduct', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|min:1',
            'cover' => 'image',
            'description' => 'nullable'
        ]);
    
        if(!empty($data['cover'])){
            $cover = $data['cover'];
            $path = $cover->store('covers', 'public');
            $data['cover'] = $path;
        }

        Products::findOrFail($id)->update($data);
        return Redirect::route('admin.index');
    }

    public function destroy(string $id)
    {
        Products::findOrFail($id)->delete();
        return Redirect::route('admin.index');
    }

    public function destroyCover(string $id)
    {
        Products::findOrFail($id)->delete();
        return Redirect::route('admin.index');
    }
}
