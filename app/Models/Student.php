<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Lecturer;

class Student extends User
{
    use HasFactory;

    protected $fillable = [
        'First_name', 'Other_names', 'RegNo', 'Email', 'Phone_No','Department','Gender', 'Avatar', 'Password'
    ];

    public function getLectuere(){
        return $this->belongsTo(Lecturer::class, 'Supervisor_id', 'id');
    }
}
