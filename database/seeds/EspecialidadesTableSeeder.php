<?php

use Illuminate\Database\Seeder;

class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades')->insert([
            'especialidad' => 'MEDICINA GENERAL'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'MEDICINA INTERNA'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'PEDIATRÍA'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'GINECOLOGÍA'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'DERMATOLOGÍA'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'TRAUMATOLOGÍA'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'NEUMONOLOGÍA'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'FISIATRÍA'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'PSICÓLOGO'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'ECOGRAFÍA'
        ]);
        DB::table('especialidades')->insert([
            'especialidad' => 'LABORATORIO'
        ]);
    }
}
