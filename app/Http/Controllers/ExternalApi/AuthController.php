<?php

namespace App\Http\Controllers\ExternalApi;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Doctrine\DBAL\Query\QueryException;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $credentials = [
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ];
            if ($user = User::create($credentials))
                return response()->json(['successfully registered' => $user] , '200');

            return response()->json(['error' => 'failed to register user']);

    }

    public function login(Request $request)
    {
        return response()->json(['response' => 'test']);
    }
}
