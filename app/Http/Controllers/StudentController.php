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
use App\Models\Comment;
use App\Models\NoticeBoard;
use App\Models\ProjectChapter;
use App\Models\Proposal;
use App\Models\Approved_project;
use Illuminate\Support\Facades\Storage;
use Mockery\Matcher\Not;

class StudentController extends Controller
{

    public function showApproved()
    {
        return view('student.approved');
    }
    public function submitApproved(Request $request){
       $Approved= new Approved_project;
       $Approved->Name=$request->Name;
       $Approved->RegNo=$request->RegNo;
       $Approved->ProjectTitle=$request->ProjectTitle;
       $Approved->CaseStudy=$request->CaseStudy;
       $Approved->save();
       return redirect()
       ->route('approved.project')
       ->with('msg:success','Project Topic Submitted Successfully!');
    }

    public function view_supervisor()
    {
        return view('student.view_supervisor', [
            'supervisor' => Lecturer::find(Auth::guard('student')->user()->Supervisor_id)
        ]);
    }

    public function upload(Request $request)
    {
        return view('student/upload', [
            'proposalId' => $request->pid
        ]);
    }

    public function saveUpload(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:5|max:100',
            'chapter' => 'required',
            'document' => 'mimes:pdf,doc,docx'
        ]);

        $student = Auth::guard('student')->user();
        $proposalId = $request->pid;

        $uploadedDoc = $request->file('document');
        $dName = microtime(true) . '.' . $uploadedDoc->getClientOriginalExtension();
        $newFilePath = public_path("uploads/$dName");
        move_uploaded_file($uploadedDoc->getPathname(), $newFilePath);

        $projectChapter = ProjectChapter::query()->create([
            'title' => $validated['title'],
            'chapter' => $validated['chapter'],
            'document' => $dName,
            'student' => $student->id,
            'lecturer' => $student->Supervisor_id,
            'proposal' => $proposalId
        ]);

        return redirect()
            ->route('student.proposal.view', $proposalId)
            ->with('msg:success', 'Document uploaded successfully.');
    }

    public function loginForm()
    {
        return view('student.auth.login');
    }

    public function studLogin(Request $request)
    {
        validator()->make(request()->only('RegNo', 'Password'), [
            'RegNo' => 'required|min:10|max:99',
            'Password' => 'required|min:3|max:99',
        ])->validate();


        $student = Student::query()
            ->where('RegNo', $request->RegNo)
            ->get()
            ->first();

        if ($student) {
            if (Hash::check($request->Password, $student->Password)) {
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


    public function logout(): RedirectResponse
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

    public function studAuthForm()
    {
        return view('student.stud_auth');
    }

    public function studAuth(Request $request)
    {
        $student = Student::all();

        $regNo = Student::query()
            ->where('students.RegNo', $request->RegNo)
            ->get()
            ->first();

        if (!$regNo) {
            return redirect()
                ->back()
                ->with('msg:warning', 'Such student does not exists')
                ->withInput();
            //return  redirect()->route('student.create_password')->with('msg:success','Student authentication successful');
        } else {
            $code = DB::table('students')->where('RegNo', $request->RegNo)->value('code');
            //dd($code);
            return redirect()
                ->back()
                ->with('msg:success', 'Your Password is' . $code)
                ->withInput();
        }

        return  redirect()->route('student.auth.login')->with('msg:success', 'Student authentication successful' . $code);
    }

    public function stud_view_notice()
    {

        $studpost = NoticeBoard::query()
            ->where('Recipient_type', 'student')
            ->where('Recipient_id', Auth::guard('student')->user()->id)
            ->get();

        return view('student.view_notice_board', [
            'noticeboards' => $studpost
        ]);
    }

    public function listProposals()
    {
        $proposal=Proposal::query()
        ->select('proposals.*','proposals.lecturer')
        ->join('students','students.id','proposals.student')
        ->where('proposals.student',auth::guard('student')->user()->id)
        ->get();
        return view('student.proposal.list',[
            'proposals'=>$proposal
        ]);

    }


    public function showProposal()
    {
        return view('student.proposal');
    }


    public function saveProposal(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:100',
            'document' => 'required|file|mimes:pdf,doc,docx'
        ]);

        $currentStudent = Auth::guard('student')->user();
       // @dd(Auth::guard('student')->user());
        $uploadedDoc = $request->file('document');

        $dName = microtime(true) . '.' . $uploadedDoc->getClientOriginalExtension();
        $newFilePath = public_path("uploads/$dName");
        move_uploaded_file($uploadedDoc->getPathname(), $newFilePath);

        $proposal = Proposal::query()->create([
            'student' => $currentStudent->id,
            'lecturer' => $currentStudent->Supervisor_id,
            'title' => $request->post('title'),
            'document' => $dName
        ]);

        return redirect()
            ->to("/student/proposal/{$proposal->id}")
            ->with('msg:success', 'Proposal submitted successfully.');
    }

    public function viewProposal(Request $request)
    {
        $proposal = Proposal::query()
            ->select('proposals.*', 'lecturers.First_name', 'lecturers.Other_names')
            ->join('lecturers', 'lecturers.id', 'proposals.lecturer')
            ->where('student', Auth::guard('student')->user()->id)
            ->where('proposals.id', $request->pid)
            ->get()
            ->first();

        return view('student.view_proposal', [
            'proposal' => $proposal
        ]);
    }

    public function view_feedback()
    {
        $comment=Comment::query()
        ->where('comments.student_id',auth::guard('student')->user()->id)
        ->get();
        return view('student.view_feedback',[
            'comments'=>$comment
        ]);
    }


    public function showUploadsList(){
        $chapter = ProjectChapter::query()
            ->select('project_chapters.*','project_chapters.lecturer')
            ->join('students','students.id','project_chapters.student')
            ->where('project_chapters.student',auth::guard('student')->user()->id)
            ->get();

        return view ('student.list_uploads',[
            'project_chapters'=>$chapter
        ]);
    }

    public function viewUploadInfo(Request $request)
    {
        if('POST' == $request->getMethod()){
            $validated = $request->validate([
                'message' => 'required|min:2|max:500'
            ]);

            Comment::post([
                'uploadId' => $request['id'],
                'message' => $validated['message'],
                'sender_type' => 'student'
            ]);
        }

        $upload = ProjectChapter::query()->find($request['id']);
        $comments = Comment::getComments($request['id']);
        return view('student.view_upload_info', compact('upload', 'comments'));
    }
 }

