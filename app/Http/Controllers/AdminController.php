<?php

namespace App\Http\Controllers;

use App\Image;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\NoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



class AdminController extends Controller
{
    public function admindash(){
        return view('admin/dashboard');
    }
    
    
    public function lecturer(){
        return view ('admin/manage_lecturer');
    }
   
    public function project(){
        return view ('admin/manage_project');
    }
    
    public function post(){
        return view('admin/post', [
            'noticeboards' => NoticeBoard::all(),
        ]);
    }


    public function doPost(Request $request){
        $data=$request->validate([
            'Recipient'=>'required',
            'Title'=>'required',
            'Message'=>'required'
        ]);
        
    }
    
   
    public function student(){
        $data['lecturers'] = Lecturer::all();
        return view('admin.manage_student', $data);
    }
    

    public function view_student(){
        return view('admin.view_student', [
            'students' => Student::all()
        ]);
    }


    public function assign_supervisor(){
        return view('admin.assign_supervisor',[
            'students'=> Student::all()
        ]);
    }

    public function assign_supervisor_list_lecturers(){
        return view ('admin.supervisor_list',[
            'lecturers'=>Lecturer::all()
        ]);
    }
    public function view_notice(){
        
       
         return view('admin.post', [
        'noticeboards' => NoticeBoard::all()
        ]);
    }
    



    public function readdStudent(){
        return view('admin.manage_student');
    }
    
    
    public function createPost(Request $request){
        $data=$request->validate([
            'Recipient_type'=>'required',
            'Message'=>'required'
        ]);

        if('student' == $data['Recipient_type']){
            $users = Student::all('id');
        }else{
            $users = Lecturer::all('id');
        }

        $users->each(function($user) use($data){    
            NoticeBoard::query()->create([
                'Recipient_type' => $data['Recipient_type'],
                'Recipient_id' => $user->id,
                'Message' => $data['Message'],
            ]);
        });

        return redirect()->route('admin.post')
            ->with('msg:success', 'Notification sent successfully');
    }


    public function addStudent(Request $request)
    {
        $data = $request->validate([
            'First_name' => 'required|min:3|max:99',
            'Other_names' => 'required|min:3|max:99',
            'RegNo'=> 'required|min:16|max:99',
            'Email'=>'required|min:10|max:99|email',
            'Gender'=>'required',
            'Avatar'=>'required|mimes:jpg,png,bmp'
        ]);
        $code = rand(0000, 9999);
        $student = new Student();
        $student->First_name = $request->First_name;
        $student->Other_names = $request->Other_names;
        $student->RegNo = $request->RegNo;
        $student->Email = $request->Email;
        $student->Supervisor_id = $request->Supervisor_id;
        $student->Gender = $request->Gender;
        $student->Password = bcrypt($code);
        $student->code = $code;
        if($request->file('Avatar')) {
            $file = $request->Avatar;
            $fileName = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('uploads/'), $fileName);
            $student->Avatar = $fileName;
            $student->save();
        }



        

        return redirect()->route('admin.manage_student')->with('msg:success', 'Student created successfully');
    }

    public function viewStudent(Request $request)
    {
        $student = Student::find($request->id);
       // dd($student);
    }
    public function addLecturer(request $request){
        $data=$request->validate([
            'First_name'=>'required|min:3|max:99',
            'Other_names'=>'required|min:3|max:99',
            'Email'=>'required|min:10|max:99',
            'Avatar'=>'required|mimes:jpg,png,bmp'
            

        ]);
        $code = rand(0000, 9999);
        $lecturer = new Lecturer();
        $lecturer->First_name = $request->First_name;
        $lecturer->Other_names = $request->Other_names;
        $lecturer->Email = $request->Email;
        $lecturer->Password = bcrypt($code);
        $lecturer->code = $code;
        if($request->file('Avatar')) {
            $file = $request->Avatar;
            $fileName = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('uploads/'), $fileName);
            $lecturer->Avatar = $fileName;
            $lecturer->save();
        }

        
        return redirect()->route('admin.manage_lecturer')->with('msg:success','Lecturer created successfully');
    }

    public function listStudents()
    {
        $students = Student::all();
        
        return view('admin/student/index')->with(compact('student'));
    }
    public function view_lecturer(){
        return view('admin.view_lecturer')
            ->with('lecturers', Lecturer::all());
    }
}
