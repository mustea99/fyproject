<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectChapter extends Model
{
    protected $fillable=['Project','Document','Chapter'];
    use HasFactory;
}
