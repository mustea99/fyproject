<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin/auth/login');
    }

    public function doLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|min:15|max:50',
            'password' => 'required|min:4|max:100'
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()
                ->route('admin.post');
                //->with('msg:success', 'You are logged in successfully.');
        }

        return redirect()
            ->back()
            ->with('msg:warning', 'Incorrect email or password')
            ->withInput($request->all());
}

    public function logout(): RedirectResponse
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }

        return redirect()->back()->with('msg:warning', 'You are not an admin');
    }
}
