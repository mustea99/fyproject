<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectChapter extends Model
{
    protected $fillable = ['proposal', 'document', 'chapter', 'title', 'student', 'lecturer'];
    use HasFactory;
}
