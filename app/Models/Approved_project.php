<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Approved_project extends Model
{
    protected $fillable=['Name','RegNo','ProjectTitle','CaseStudy'

    ];
    use HasFactory;

}
