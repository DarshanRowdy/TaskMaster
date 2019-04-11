<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Darshan Rathod',
            'email' => 'darshanrathod.info@gmail.com',
            'password' => bcrypt('12345678'),
            'auth_token' => Str::random(16),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Darshan',
            'email' => 'darshanrathod1993@gmail.com',
            'password' => bcrypt('12345678'),
            'auth_token' => Str::random(16),
            'role' => 'user'
        ]);

        DB::table('users')->insert([
            'name' => 'Pooja',
            'email' => 'poojarathod.info@gmail.com',
            'password' => bcrypt('12345678'),
            'auth_token' => Str::random(16),
            'role' => 'user'
        ]);
    }
}
