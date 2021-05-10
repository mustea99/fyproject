<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['student', 'lecturer', 'title', 'document', 'status'];

    public function getTextualStatus()
    {
        switch($this->status){
            case 0:
                return '<span class="badge badge-info badge-pill">Pending</span>';
            break;
            case 1:
                return '<span class="badge badge-success badge-pill">Accepted</span>';
            break;
            default:
                return '<span class="badge badge-danger badge-pill">Declined</span>';
        }
    }
}
