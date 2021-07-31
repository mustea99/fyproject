<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Super extends \Illuminate\Foundation\Auth\User
{
   protected $fillable=['email','password'];
    use HasFactory;
}
