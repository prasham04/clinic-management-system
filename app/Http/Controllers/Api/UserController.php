<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ApiTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use ApiTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '=', 'admin')->get();

        return $this->apiResponse(200, 'All users', 'null', $users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'digits:11'],
            'password' => ['required', 'confirmed', 'string', 'min:8']
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(400, 'validation failed', $validator->errors(), null);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'role' => 'admin'
        ]);

        return $this->apiResponse(200, 'User Created', 'null', $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return $this->apiResponse(404, 'User Not Found', 'User Not Found', $user);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'digits:11'],
            'password' => ['required', 'confirmed', 'string', 'min:8']
        ]);

        if ($validator->fails()) {
            return $this->apiResponse(400, 'validation failed', $validator->errors(), null);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'role' => 'admin'
        ]);

        return $this->apiResponse(200, 'User updated', 'null', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if(!$user) {
            return $this->apiResponse(404, 'User not found', 'User not found', $user);
        }

        $user->delete();

        return $this->apiResponse(200, 'User deleted', 'null', $user);
    }
}
