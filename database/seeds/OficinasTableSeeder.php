<?php

use Illuminate\Database\Seeder;

class OficinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oficinas')->insert([
            'oficina' => 'GINECOLOGÍA'
        ]);
        DB::table('oficinas')->insert([
            'oficina' => 'LABORATORIO'
        ]);
        DB::table('oficinas')->insert([
            'oficina' => 'SALA DE OBSERVACIÓN'
        ]);
    }
}
