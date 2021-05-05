<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class Student extends User
{
    use HasFactory;

    protected $fillable = [
        'First_name', 'Other_names', 'RegNo', 'Email', 'Gender', 'Avatar', 'Password'
    ];


    public static function create(array $studentData)
    {
        $rawPassword = $studentData['Password'];
        $studentData['Password'] = Hash::make($studentData['Password']);
        $student = parent::query()->create($studentData);
        
        $password = new Password();

        $password->User_type = 'student';
        $password->User_id = $student->id;
        $password->Password = $rawPassword;
        $password->save();

        return $student;
    }
}
