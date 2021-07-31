<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\Super;
use Illuminate\Database\Seeder;

class SuperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Super::query()->create([
            'email' => 'admin@fypms.test',
            'password' => Hash::make('1234'),
        ]);
    }
}
