<?php
namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use App\Models\NoticeBoard;
use App\Models\ProjectChapter;
use App\Models\Student;
use App\Models\Proposal;
use App\Models\Comment;
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
        $projectChapter=ProjectChapter::query()
        ->select('project_chapters.*','students.First_name','students.Other_names','students.RegNo')
        ->join('students','students.id','project_chapters.student')
        ->where('students.Supervisor_id',auth::guard('lecturer')->user()->id)
        ->get();
        return view('lecturer.view_student_upload',['project_chapters'=>$projectChapter
        ]);
    }


    public function view_notice_board(){
        $lecturerpost=NoticeBoard::query()
        ->where('Recipient_type', 'lecturer')
        ->where('Recipient_id', Auth::guard('lecturer')->user()->id)
        ->get();

        return view('lecturer.view_notice_board',[
            'noticeboards'=>$lecturerpost]);

    }


    public function send_feedback($id){
            $data['feedback'] = ProjectChapter::findOrFail($id);
            $data['lecturers'] = Lecturer::all();
            $data['proposals'] =Proposal::all();
            $data['students']=Student::all();
            //dd( $data['feedback']->toArray());
            return view('lecturer.send_feedback', $data);
    }


    public function studProposal(){
        $proposal=Proposal::query()
        ->select('proposals.*','students.First_name','students.Other_names')
        ->join('students','students.id','proposals.student')
        ->where('students.Supervisor_id',auth::guard('lecturer')->user()->id)
        ->get();
       // @dd( $proposal);

        return view('lecturer.manage_proposal',['proposals'=>$proposal]);
    }
    public function studChapter(){
        $projectChapter=ProjectChapter::query()
        ->select('project_chapters.*','students.First_name','students.Other_names')
        ->join('students','students.id','project_chapters.student')
        ->where('students.Supervisor_id',auth::guard('lecturer')->user()->id)
        ->get();
    }

    public function sendFeed(Request $request, $id){
        
        $comment  = new Comment();
        $comment->student_id = $request->student_id;
        $comment->lecturer_id = $request->lecturer_id;
        $comment->title = $request->title;
        $comment->chapter = $request->chapter;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->route('lecturer.view_student_upload')->with('msg:success','Comment sent successfully!');

    }
}
