<?php

namespace App\Http\Controllers\admin\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage() {
        return view ('admin.auth.login');
    }

    public function login(Request $request) {
        // $this->validate($request, [
        //     'email' =>'required|email',
        //     'password' => '<PASSWORD>'
        // ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials) && (auth()->user()->role == 'admin')) {
            return redirect()->intended(route('admin.dashboard'));
        }
        $this->logout();

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout() {
        
        Auth::logout();
        request()->session()->invalidate();
        return redirect()->route('admin.login');
    }
}
