<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    protected $fillable = ['user_type', 'user_id', 'password'];

    public $timestamps = false;
}
