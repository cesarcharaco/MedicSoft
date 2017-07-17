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
        DB::table('users')->insert([
            'name' => 'Cesar',
            'email' => 'jcesarchg9@gmail.com',
            'password' => bcrypt('1234'),
            'tipo_user' => 'Administrador'
        ]);

        DB::table('users')->insert([
            'name' => 'Abraham',
            'email' => 'abraham@gmail.com',
            'password' => bcrypt('1234'),
            'tipo_user' => 'Administrador'
        ]);

        DB::table('users')->insert([
            'name' => 'Anibal',
            'email' => 'anibal@gmail.com',
            'password' => bcrypt('1234'),
            'tipo_user' => 'Administrador'
        ]);
    }
}
