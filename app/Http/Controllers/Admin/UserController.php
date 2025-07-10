<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Models\Order;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }


    public function edit($id)
    {
        $user = User::where('id', $id)->with('role', 'orders', 'addresses')->first();
        $roles = Roles::all();
        $orders = Order::where('user_id', $id)->get();
        return view('admin.users.edit', compact('user', 'roles', 'orders'));
    }
}
