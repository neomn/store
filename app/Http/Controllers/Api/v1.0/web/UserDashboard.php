<?php

namespace App\Http\Controllers\Api\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserDashboard extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $orders = $user->orders;
        $products = [];
        foreach ($orders as $order) {
            $products = $order->product;
        }
        return response($user);

    }
}
