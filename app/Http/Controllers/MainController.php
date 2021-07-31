<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        echo "Hello world";
    }

    public function chat()
    {
        if (Auth::guard('lecturer')->check()) {
            return view('lecturer.chat');
        }

        return view('student.chat');
    }

    public function studentChat()
    {
        if (Auth::guard('student')->check()) {
            return view('student.chat');
        }

        return view('lecturer.chat');
    }

    public function testView()
    {
        return view('one');
    }

    public function testViewArgs()
    {
        $name = strtoupper('ahmad');

        return view('args', ['suna' => $name, 'fname' => 'Musty']);
    }

    public function checkPass()
    {
        echo "Check passed";
    }
}
