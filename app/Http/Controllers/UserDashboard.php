<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserDashboard extends Controller
{
    public function index(Request $request){
//        return $request->user()->products();
        return response('user dashboard api -> index');
    }
}
