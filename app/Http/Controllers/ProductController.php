<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // if(!Gate::allows("clientAccess", Auth::user())){
        //     echo "Access denied!";
        //     exit;
        // }

        $products = Product::all();
       return view('public.home', compact('products'));
    }

    public function category($category)
    {
        $allProducts = Product::all();
        $products = Product::where('category', $category)->get();

        switch ($category) {
            case 'plants':
                return view('public.plants', compact('products', 'allProducts'));
                break;
            case 'grains':
                return view('public.grains', compact('products', 'allProducts'));
                break;
            case 'outils':
                return view('public.outils', compact('products', 'allProducts'));
                break;
        }
        
    }

    public function admin()
    {
        if(!Gate::allows("adminAccess", Auth::user())){
            echo "Access denied!";
            exit;
        }

        $products = Product::all();
       return view('admin.dashboard', compact('products'));
    }

    public function addProduct(Request $request)
    {
        if(Gate::allows("adminAccess", Auth::user())){
            
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
        else
            return redirect('/');
        
    }

    public function removeProduct(Product $product)
    {
        if(Gate::allows("adminAccess", Auth::user())){
            $product->delete();
            return redirect('/admin');
        }
        else
            return redirect('/');
    }

    public function editProduct(Request $request)
    {
        if(Gate::allows("adminAccess", Auth::user())){
            $productData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'stock' => 'required|integer'
            ]);

            Product::findOrFail($request->id)->update($productData);// find or fail to prevent 500 errors and instead giving the user 404 error to prevent showing our code structure to the users

            return redirect('/admin');
        }
        else
            return redirect('/');
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
