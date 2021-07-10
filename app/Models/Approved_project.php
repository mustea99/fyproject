<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approved_project extends Model
{
    protected $fillable=['Name','RegNo','ProjectTitle','CaseStudy'

    ];
    use HasFactory;
}
