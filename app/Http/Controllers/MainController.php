<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        echo "Hello world";
    }

    public function testView()
    {
        return view('one');
    }

    public function testViewArgs()
    {
        $name = strtoupper('ahmad');

        return view('args',['suna' => $name, 'fname' => 'Musty']);
    }

    public function checkPass()
    {
        echo "Check passed";
    }
}
