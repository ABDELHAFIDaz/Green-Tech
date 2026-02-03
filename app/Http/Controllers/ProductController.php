<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
       return view('public.home', compact('products'));
    }

    public function category($category)
    {
        $products = Product::where('category', $category)->get();
        switch ($category) {
            case 'plants':
                return view('public.plants', compact('products'));
                break;
            case 'grains':
                return view('public.grains', compact('products'));
                break;
            case 'outils':
                return view('public.outils', compact('products'));
                break;
        }
        
    }

    public function admin()
    {
        $products = Product::all();
       return view('admin.dashboard', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $productData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'stock' => 'required|integer'
        ]);

        Product::create($productData);

        return redirect('/admin');
    }

    public function removeProduct($id)
    {
        Product::find($id)->delete();
        return redirect('/admin');
    }

    public function editProduct(Request $request)
    {
        $productData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'stock' => 'required|integer'
        ]);

        Product::find($request->id)->update($productData);

        return redirect('/admin');
    }

    public function productSearch(Request $request, $user)
    {
        $products = Product::where('name', $request->searchValue)->get();

        switch ($user) {
            case 'admin':
                return view('admin.dashboard', compact('products'));
                break;
            
            case 'clien':
                return view('public.home', compact('products'));
                break;
        }
    }
}
