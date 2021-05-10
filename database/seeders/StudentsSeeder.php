<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            [
                'First_Name' => 'Sultan',
                'Other_names' => 'Ibrahim',
                'RegNo'=>'cst/16/com/00688',
                'Email'=>'sultantech@gmail.com',
                'Gender'=>'Male',
                'Avatar'=>'assets/img/logo/admin-back3.jpg',
                'Password'=> '1234',
                'Supervisor_id' => 1,
                'Department' => 'Computer Science'
            ],
            [
                'First_Name' => 'Musa',
                'Other_names' => 'Ibrahim',
                'RegNo'=>'cst/16/com/00600',
                'Email'=>'sultantech@yahoo.com',
                'Gender'=>'Male',
                'Avatar'=>'assets/img/logo/admin-back3.jpg',
                'Password'=> '1234',
                'Supervisor_id' => 1,
                'Department' => 'Computer Science'
            ],
        ];
    
        foreach($students as $student){
            $rawPassword = $student['Password'];
            $student['Password'] = Hash::make($rawPassword);
            $student['code'] = $rawPassword;
            Student::create($student);
        }
    }
}
