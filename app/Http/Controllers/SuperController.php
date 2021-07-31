<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Super;

class SuperController extends Controller
{
    public function adminLogin(){
        return view('super.auth.login');
    }
    // admin login  
    public function doLogin(Request $request):RedirectResponse
    {
        // validate admin details before logging 
        $request->validate([
            'email' => 'required|email|min:15|max:50',
            'password' => 'required|min:4|max:100'
        ]);

        if (Auth::guard('super')->attempt($request->only('email', 'password'))) {
            return redirect()
            ->route('super.addProjectCord')
                ->with('msg:success', 'You are logged in successfully.');
        }

        return redirect()
            ->back()
            ->with('msg:warning', 'Incorrect email or password')
            ->withInput($request->all());
    }

    // admin add project coordinator page 
    public function showAddProjectCord(){
        return view('super.auth.add_project_cord');
    }

    // admin logout function 
    public function logout(): RedirectResponse
    {
        if (Auth::guard('super')->check()) {
            Auth::guard('super')->logout();
            return redirect()->route('super.auth.login');
        }
        return redirect()->back()->with('msg:warning', 'You are not an admin');
    }
    //add project cordinator 
    public function addProjectCord(Request $request){
        $project_coordinator= new Admin();
        $code=rand(0000,9999);
        $project_coordinator->email=$request->email;
        $project_coordinator->code=$code;
        $project_coordinator->password=bcrypt($code);
        $project_coordinator->save();
        return redirect()
        ->route('super.view_project_cord')
        ->with('msg:success','Project Coordinator added Successfully!');

    }
    //view project coordinator details 
    public function viewProjectCoord(){
        $data= Admin::all();
        return view('super.auth.view_project_cord',[
            'admins'=>$data]);
    }
    
}
