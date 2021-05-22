<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['student', 'lecturer', 'title', 'document', 'status'];

    public function getTextualStatus(?string $htmlClass = null): string
    {
        switch ($this->status) {
            case 0:
                return '<span class="badge badge-info badge-pill ' . $htmlClass . '">Pending</span>';
                break;
            case 1:
                return '<span class="badge badge-success badge-pill ' . $htmlClass . '">Accepted</span>';
                break;
            default:
                return '<span class="badge badge-danger badge-pill ' . $htmlClass . '">Rejected</span>';
        }
    }
}
