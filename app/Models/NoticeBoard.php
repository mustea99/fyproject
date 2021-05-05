<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeBoard extends Model
{
    protected $fillable=['Recipient_id','Recipient_type','Message', 'Status'];
    use HasFactory;
}
