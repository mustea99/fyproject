<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use DB;
class LecturerController extends Controller
{
   
    public function viewstudent(){
        return view('lecturer.view_student');
    }


    public function lecturerLogin(){
        return view('lecturer.auth.login');
    
    }


    public function lect_auth(){
        return view('lecturer.lect_auth');
    }


    public function lecturerAuth(Request $request){
        $lecturer = Lecturer::all();
        //@dd($lecturer);
        $email = Lecturer::query()
                ->where('lecturers.Email', $request->Email)
                ->get()
                ->first();

        if(!$email){
            return redirect()
                ->back()
                ->with('msg:warning', 'Lecturer with such details does not exists')
                ->withInput();
                //return  redirect()->route('student.create_password')->with('msg:success','Student authentication successful');
        }
        else {
            
            $code = DB::table('lecturers')->where('Email', $request->Email)->value('code');
            return redirect()
            ->back()
            ->with('msg:success', 'Your Password is' .$code)
            ->withInput();
        }

        
    }


    public function grade_student(){
        return view('lecturer.grade_student');
    }


    public function view_student_upload(){
        return view('lecturer.view_student_upload');
    }


    public function view_notice_board(){
        return view ('lecturer.view_notice_board');
    }


    public function send_feedback(){
        return view('lecturer.send_feedback');
    }


    public function studProposal(){
        return view('lecturer.manage_proposal');
    }
}
