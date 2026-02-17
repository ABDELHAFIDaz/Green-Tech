<?php

namespace App\Http\Controllers;

use App\Models\Favoris;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
   
    public function index()
    {
        $favorites = Product::all();
        return view('public.favoris', compact('favorites'));
    }
}
