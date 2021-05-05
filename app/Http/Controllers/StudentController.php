<?php

namespace App\Http\Controllers;

use App\Models\Password;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Lecturer;
use App\Models\NoticeBoard;
use Mockery\Matcher\Not;

class StudentController extends Controller
{
    public function view_supervisor(){
     return view ('student.view_supervisor');

    }
   public function upload(){
        return view('student/upload');
   }
   public function loginForm(){
        return view('student.auth.login');
    }
    public function studLogin(Request $request){
        validator()->make(request()->only('RegNo','Password'), [
            'RegNo' => 'required|min:10|max:99',
            'Password' => 'required|min:4|max:99',
        ])->validate();

        
        $student = Student::query()
            ->where('RegNo', $request->RegNo)
            ->get()
            ->first();

        if($student){
            if(Hash::check($request->Password, $student->Password)){
                Auth::guard('student')->login($student);
                return redirect()
                    ->route('student.view_notice_board')
                    ->with('msg:success', 'You are logged in successfully.');
            }
        }
       
       return redirect()
            ->back()
            ->with('msg:warning', 'Incorrect Registration Number or password')
            ->withInput($request->all());
}


public function logout():RedirectResponse
    {
        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
            return redirect()->route('student.auth.login');
        }

       return redirect()->back()->with('msg:warning', 'You are not an admin');
    }

        // $student = Student::query()
        //     ->where('RegNo', request()->only('RegNo'))
        //     ->get();

        // if(null == $student || null == $student->get('password')){
        //     return redirect()->back()
        //         ->withInput(request()->all())
        //         ->with('error', 'Such user does not exists.');
        // }
        
        // if( Hash::check(request()->only('Password'), $student->only('Password'))){
        //     return redirect()->to('/');
        // }

        // return redirect()->back()
        //     ->withInput(request()->all())
        //     ->with('error', 'Incorrect password.');
    
    public function studAuthForm(){
        return view('student.stud_auth');
    }

    public function studAuth(Request $request){
        $student = Student::all();
        
        $regNo = Student::query()
                ->where('students.RegNo', $request->RegNo)
                ->get()
                ->first();

        if(!$regNo){
            return redirect()
                ->back()
                ->with('msg:warning', 'Such student does not exists')
                ->withInput();
                //return  redirect()->route('student.create_password')->with('msg:success','Student authentication successful');
        }
        else {
            $code = DB::table('students')->where('RegNo', $request->RegNo)->value('code');
            //dd($code);
            return redirect()
            ->back()
            ->with('msg:success', 'Your Password is' .$code)
            ->withInput();
        }

        return  redirect()->route('student.auth.login')->with('msg:success','Student authentication successful'.$code);
    }
    
    public function stud_view_notice(){
    
      return view('student.view_notice_board',['noticeboards'=>NoticeBoard::all()
      ]);
      $studpost=NoticeBoard::query()->where('noticeboards.Recipient_type'=='student')->value('Message');
     }


     public function showProposal(){
         return view('student.proposal');
     }


     public function studentPropse(){
         
     }


     public function view_feedback(){
         return view('student.view_feedback');
     }

     public function createPassForm(){
         return view('student.create_password');
     } 
     public function doCreatePass(){

     }
    }