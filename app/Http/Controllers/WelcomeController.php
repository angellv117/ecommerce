<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cover;
use App\Models\Product;
class WelcomeController extends Controller
{
    //
    public function index()
    {
        //traer las coberturas activas que están entre la fecha actual y la fecha de fin
        $covers = Cover::where('is_active', true)
        ->where('start_date', '<=', now())
        ->where(function ($query) {
            $query->where('end_date', '>=', now())
                  ->orWhereNull('end_date');
        })
        ->get();



        $products = Product::where('is_active', true)->orderBy('id', 'desc')->with('images')->take(10)->get();
        return view('welcome', compact('covers', 'products'));
    }
}
