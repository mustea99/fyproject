<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CommentMessage extends Model
{
    use HasFactory;

    protected $fillable = ['sender', 'receiver', 'message', 'comment', 'sender_type'];

    public function getSender(): Authenticatable
    {
        // check sender type 
        if ('student' == $this->sender_type) {
            return Auth::guard('student')->user();
        }
         return Auth::guard('lecturer')->user();
    }
        // if('student'==$this->sender_type){
        //     return Student::query()->find($this->getSender);
        // }
        // return Lecturer::query()->find($this->getSender);

    }

