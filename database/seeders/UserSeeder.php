<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'role_id'=>'1',
            'name'=>'Md.Mustafizur Rahman',
            'username'=>'admin',
            'email'=>'s.musta69@gmail.com',
            'password' => Hash::make('password'),

        ]);

        DB::table('users')->insert([
            'role_id'=>'2',
            'name'=>'Md.Author Rahman',
            'username'=>'author',
            'email'=>'author@gmail.com',
            'password' => Hash::make('author'),

        ]);
    }
}
