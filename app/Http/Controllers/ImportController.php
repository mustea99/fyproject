<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Lecturer;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\LecturerImport;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    //

     public function store(Request $request){
        //  $file=$request->file('file');
         $data = Excel::toArray(new UsersImport, $request->file('file') );
        //  return $data;
         foreach($data as $studentrecord){
             foreach($studentrecord as $student){
            if(!empty($student['first_name'])){
                $code = rand(0000, 9999);
                $stud = new Student();
                $stud->First_name = $student['first_name'];
                $stud->Other_names = $student['other_names'];
                $stud->RegNo = $student['regno'];
                $stud->Email = $student['email'];
                $stud->Phone_No=$student['phone_no'];
                $stud->Department=$student['department'];
                $stud->Supervisor_id = $student['supervisor_id'];
                $stud->Gender = $student['gender'];
                $stud->Password = bcrypt($code);
                $stud->code = $code;
                $stud->save();
               }
             }
            

         }
         return redirect()->route('admin.view_student')->with('msg:success','Student data imported Successfully!');
       
     } 

    //  Lecturer Import Function 

    public function storeLecturer(Request $request){
        //  $file=$request->file('file');
         $data = Excel::toArray(new UsersImport2, $request->file('file') );
        //  return $data;
         foreach($data as $lecturerRecord){
             foreach($lecturerRecord as $lecturer){
            if(!empty($lecturer['first_name'])){
                $code = rand(0000, 9999);
                $lecturer = new Lecturer();
                $lecturer->First_name =$lecturer['first_name'];
                $lecturer->Other_names = $lecturer['other_names'];
                $lecturer->Email = $lecturer['email'];
                $lecturer->Staff_id =$lecturer['staff_id'];
                $lecturer->Department=$lecturer['department'];
                $lecturer->Phone_No=$lecturer['phone_no'];
                $lecturer->Office = $lecturer['office'];
                $lecturer->Password = bcrypt($code);
                $lecturer->code = $code;
                $lecturer->save();
               }
             }
            

         }
         return redirect()->route('admin.view_lecturer')->with('msg:success','Lecturer data imported Successfully!');
       
     } 

}
