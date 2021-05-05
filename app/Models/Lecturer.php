<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $fillable=[
        'First_name','Other_names','Email','Avatar','Password'
    ];

    public function getFullName($firstNameLast = false)
    {
        if($firstNameLast){
            return $this->other_names . ' ' . $this->first_name;
        }

        return $this->first_name . ' ' . $this->other_names;
    }
}
