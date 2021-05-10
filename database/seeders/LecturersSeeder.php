<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;

class LecturersSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturers = [
            [
                'First_Name' => 'yusuf',
                'Other_names' => 'Fagge',
                'Email'=>'sultantech@gmail.com',
                'Avatar'=>'assets/img/logo/admin-back3.jpg',
                'Password'=> '1234',
                'Department' => 'Computer Science',
                'Office' => '1'
            ],
            [
                'First_Name' => 'Mallam',
                'Other_names' => 'maryam',
                'Email'=>'sultantech@yahoo.com',
                'Avatar'=>'assets/img/logo/admin-back3.jpg',
                'Password'=> '1234',
                'Department' => 'Computer Science',
                'Office' => '2'
            ],
        ];

        foreach($lecturers as $lecturer){
            Lecturer::query()->create($lecturer);
        }
    }
}
