<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\withHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
class UsersImport implements ToModel, withHeadingRow
{
    use importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new User([
            'First_name'=>$row['First_name'],
            'Other_names'=>$row['Other_names'],
            'Email'=>$row['Email'],
            'Staff_id'=>$row['Staff_id'],
            'Department'=>$row['Department'],
            'Phone_No'=>$row['Phone_No'],
            'Office'=>$row['Office']

        ]);
    }
}
