<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use App\Models\Student;

class Lecturer extends User
{
    use HasFactory;

    protected $fillable = [
        'First_name', 'Other_names', 'Email', 'Staff_id', 'Department', 'Phone_No', 'Office', 'Password'
    ];

    public function student()
    {
        return $this->hasMany(Student::class, 'id', 'Supervisor_id');
    }


    public function getFullName(): string
    {
        return "{$this['First_name']} {$this['Other_names']}";
    }
}
