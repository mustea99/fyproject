<?php

namespace App\Http\Controllers;

use App\Image;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\NoticeBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use DB;



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
        
      $students = Student::query()
        ->select('students.*', 'lecturers.First_name AS lFirst_name', 'lecturers.Other_names AS lOther_names')
        ->join('lecturers', 'students.Supervisor_id', 'lecturers.id')
        ->get(); 
        
        return view('admin.view_student', [
            'students' => $students
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
        ]);
        $code = rand(0000, 9999);
        $student = new Student();
        $student->First_name = $request->First_name;
        $student->Other_names = $request->Other_names;
        $student->RegNo = $request->RegNo;
        $student->Email = $request->Email;
        $student->Phone_No=$request->Phone_No;
        $student->Department=$request->Department;
        $student->Supervisor_id = $request->Supervisor_id;
        $student->Gender = $request->Gender;
        $student->Password = bcrypt($code);
        $student->code = $code;
        $student->save();

        return redirect()->route('admin.view_student')->with('msg:success', 'Student created successfully');
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
            
            

        ]);
        $code = rand(0000, 9999);
        $lecturer = new Lecturer();
        $lecturer->First_name = $request->First_name;
        $lecturer->Other_names = $request->Other_names;
        $lecturer->Email = $request->Email;
        $lecturer->Staff_id=$request->Staff_id;
        $lecturer->Department=$request->Department;
        $lecturer->Phone_No=$request->Phone_No;
        $lecturer->Office=$request->Office;
        $lecturer->Password = bcrypt($code);
        $lecturer->code = $code;
        $lecturer->save();
      
        return redirect()->route('admin.view_lecturer')->with('msg:success','Lecturer created successfully!');
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


    public function deleteStudent($id){
        $user = Student::findOrFail($id);
        $user->delete();
        // DB::delete('delete from students where id=?',[$id]);
        return redirect()->route('admin.view_student')->with('msg:success','Student Deleted Successfully');
    }

    public function deleteLecturer($id){
        $user = Lecturer::findOrFail($id);
        $user->delete();
        // DB::delete('delete from students where id=?',[$id]);
        return redirect()->route('admin.view_lecturer')->with('msg:success','Lecturer Deleted Successfully');
    }

    public function EditStudent($id){
        $data['editStudent'] = Student::findOrFail($id);
        $data['lecturers'] = Lecturer::all();
        //dd( $data['editStudent']->toArray());
        return view('admin.edit_student', $data);
    }

    public function editLecturer($id){
        $data['editLecturer'] = Lecturer::findOrFail($id);
        //dd( $data['editStudent']->toArray());
        return view('admin.edit_lecturer', $data);
    }



    public function UpdateStudent(Request $request, $id){
        $editStudent = Student::find($id);
        $editStudent->First_name = $request->First_name;
        $editStudent->Other_names = $request->Other_names;
        $editStudent->Email = $request->Email;
        $editStudent->Supervisor_id = $request->Supervisor_id;
        $editStudent->RegNo = $request->RegNo;
        $editStudent->Phone_no = $request->Phone_No;
        $editStudent->Department = $request->Department;
        $editStudent->Gender = $request->Gender;
        
        $editStudent->update();

        return redirect()->route('admin.view_student')->with('msg:success','Student Updated Successfully');
    }
    public function UpdateLecturer(Request $request,$id){
        $editLecturer=Lecturer::find($id);
        $editLecturer->First_name=$request->First_name;
        $editLecturer->Other_names=$request->Other_names;
        $editLecturer->Email = $request->Email;
        $editLecturer->Department=$request->Department;
        $editLecturer->Staff_id=$request->Staff_id;
        $editLecturer->Phone_No=$request->Phone_No;
        $editLecturer->Office=$request->Office;
        $editLecturer->update();
    

        return redirect()->route('admin.view_lecturer')->with('msg:success','Lecturer Updated Successfully');
    }
}
