<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->paginate(5);
        return view('orders.index', compact('orders'));
    }


    
    public function show($id)
    {
        $order = Order::find($id);
        return view('orders.show', compact('order'));
    }
}
