<?php

use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turnos')->insert([
            'id_dia' => 1,
            'momento' => 'Mañana'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 1,
            'momento' => 'Tarde'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 2,
            'momento' => 'Mañana'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 2,
            'momento' => 'Tarde'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 3,
            'momento' => 'Mañana'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 3,
            'momento' => 'Tarde'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 4,
            'momento' => 'Mañana'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 4,
            'momento' => 'Tarde'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 5,
            'momento' => 'Mañana'
        ]);
        DB::table('turnos')->insert([
            'id_dia' => 5,
            'momento' => 'Tarde'
        ]);
        
    }
}
