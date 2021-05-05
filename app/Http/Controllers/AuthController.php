<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        validator()->make(request()->only('RegNo', 'Password'), [
            'RegNo' => 'required|min:10|max:99|email',
            'Password' => 'required|min:4|max:99',
        ])->validate();

        $student = Student::query()
            ->where('RegNo', request()->only('RegNo'))
            ->get();

        if(Auth::guard('student')->attempt($request->only('RegNo', 'password'))){
            return redirect()
                ->route('student.view_notice_board')
                ->with('msg:success', 'Logged in successfully.');
        }

        return redirect()->back()
            ->withInput(request()->all())
            ->with('error', 'Incorrect password.');
    }
}
