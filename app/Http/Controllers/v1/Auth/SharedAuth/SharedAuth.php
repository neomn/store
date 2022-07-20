<?php

namespace App\Http\Controllers\v1\SharedAuth;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * to develop shared functionalities between apiAuth and spaAuth that
 * doesn't need a separate controller
 */
class SharedAuth extends ApiController
{
    public function me(Request $request)
    {
        return response()->json('me');
    }

}
