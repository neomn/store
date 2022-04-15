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
        return response([
            'user dashboard api -> index',
            'name' => $user->first_name,
        ]);
    }
}
