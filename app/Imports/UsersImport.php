<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\withHeadingRow;
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
            'RegNo'=>$row['RegNo'],
            'Email'=>$row['Email'],
            'Phone_No'=>$row['Phone_no'],
            'Department'=>$row['Department'],
            'Gender'=>$row['Gender'],
            'Supervisor_id'=>$row['Supervisor_id'],

        ]);
    }
}
