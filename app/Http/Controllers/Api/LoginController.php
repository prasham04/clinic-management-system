<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use ApiTrait;
    public function login (Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(auth()->attempt($credentials)){
            $token = $request->user()->createToken('token_name')->plainTextToken;
            $data = [
                'user'  => auth()->user(),
                'token' => $token,
            ];
            return $this->apiResponse('200', 'Logged in successfully', null, $data);
        }
        return $this->apiResponse('401', 'Unauthorized', 'Unauthorized', null);
    }

    public function logout (Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->apiResponse('200', 'Logged out successfully', null, null);
    }
}
