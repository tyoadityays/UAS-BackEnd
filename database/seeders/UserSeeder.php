<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $input['name'] = 'Tyo Aditya YS';
        $input['email'] = 'tyoadityays@student.uns.ac.id';
        $input['password'] = Hash::make('12345');
        $input['role'] = 'admin';
        $input['is_aktif'] = true;
        User::create($input);
    }
}
