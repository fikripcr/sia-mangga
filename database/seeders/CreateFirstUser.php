<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data['name']     = 'Admin';
        $data['email']    = 'gatot'.time().'@pcr.ac.id';
        $data['password'] = Hash::make('gatot');
        User::create($data);

        //ini comment
    }
}
