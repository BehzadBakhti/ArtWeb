<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'=>'Behzad',
            'email'=>'behzad@artweb.com',
            'user_role'=>'admin',
            'password'=>bcrypt('12345678'),

        ]);
        App\User::create([
            'name'=>'Hani',
            'email'=>'h@h.h',
            'user_role'=>'author',
            'password'=>bcrypt('12345678'),

        ]);
        App\User::create([
            'name'=>'Viana',
            'email'=>'v@v.v',
            'user_role'=>'vendor',
            'password'=>bcrypt('12345678'),

        ]);
        App\User::create([
            'name'=>'U',
            'email'=>'u@u.u',
            'user_role'=>'user',
            'password'=>bcrypt('12345678'),

        ]);
    }
}
