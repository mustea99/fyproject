<?php
namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\NoticeBoard;
use App\Models\Student;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
   
    public function viewstudent($id){
            $data['students'] = Student::where('Supervisor_id', $id)->get();
            // dd($data['student']->toArray());
            return view ('lecturer.view_student', $data);
                
      
    }


    public function showLoginForm(){
        return view ('lecturer.auth.login');
    }


    public function doLogin(Request $request){
        validator()->make(request()->only('Email','Password'), [
            'Email' => 'required|min:10|max:99',
            'Password' => 'required|min:4|max:99',
        ])->validate();
            
        
        $lecturer = Lecturer::query()
            ->where('Email', $request->Email)
            ->get()
            ->first();
        if($lecturer){
            if(Hash::check($request->Password, $lecturer->Password)){
                Auth::guard('lecturer')->login($lecturer);
                return redirect()
                    ->route('lecturer.grade_student')
                    ->with('msg:success', 'You are logged in successfully.');
            }
        }
       
       return redirect()
            ->back()
            ->with('msg:warning', 'Incorrect staff email or password')
            ->withInput($request->all());

    }


    public function logout():RedirectResponse
    {
        if (Auth::guard('lecturer')->check()) {
            Auth::guard('lecturer')->logout();
            return redirect()->route('lecturer.auth.login');
        }

       return redirect()->back()->with('msg:warning', 'You are not an admin');
    }



    public function lect_auth(){
        return view('lecturer.lect_auth');
    }

    public function studAuth(Request $request){
        $lecturer = Lecturer::all();
        
        $email = Lecturer::query()
                ->where('lecturers.Email', $request->Email)
                ->get()
                ->first();
        
        if(!$email){
            return redirect()
                ->back()
                ->with('msg:warning','Such lecturer does not exists')
                ->withInput();
                
            }
      

        $code = DB::table('lecturers')->where('Email', $request->Email)->value('code');
           
        return  redirect()->back()->with('msg:success',' Your password is '.$code );
    }


    public function grade_student(){
        return view('lecturer.grade_student');
    }


    public function view_student_upload(){
        return view('lecturer.view_student_upload');
    }


    public function view_notice_board(){
        $lecturerpost=NoticeBoard::query()
        ->where('Recipient_type', 'lecturer')
        ->where('Recipient_id', Auth::guard('lecturer')->user()->id)
        ->get();

        return view('lecturer.view_notice_board',[
            'noticeboards'=>$lecturerpost]);

    }


    public function send_feedback(){
        return view('lecturer.send_feedback');
    }


    public function studProposal(){

        
        return view('lecturer.manage_proposal');
    }
}
