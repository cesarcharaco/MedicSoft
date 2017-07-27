<?php

use Illuminate\Database\Seeder;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicos')->insert([
            'nombres' => 'SEAMUS',
            'apellidos' => 'MCGARVEY',
            'nacionalidad' => 'V',
            'cedula' => 12345678,
            'codigo_telf' => '0416',
            'telefono' => '1233211',
            'direccion' => 'LA VICTORIA',
            'id_especialidad' => 1
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'NIGEL',
            'apellidos' => 'PHELPS',
            'nacionalidad' => 'V',
            'cedula' => 2345456,
            'codigo_telf' => '0426',
            'telefono' => '1233341',
            'direccion' => 'LA VICTORIA',
            'id_especialidad' => 2,
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'FRANCES',
            'apellidos' => 'PARKER',
            'nacionalidad' => 'V',
            'cedula' => 3454454,
            'codigo_telf' => '0412',
            'telefono' => '4332233',
            'direccion' => 'MARACAY',
            'id_especialidad' => 3
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'MARY JO',
            'apellidos' => 'MARKEY',
            'nacionalidad' => 'V',
            'cedula' => 7899898,
            'codigo_telf' => '0416',
            'telefono' => '2343666',
            'direccion' => 'LA VICTORIA',
            'id_especialidad' => 4
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'JENNY',
            'apellidos' => 'BEAVAN',
            'nacionalidad' => 'V',
            'cedula' => 19899789,
            'codigo_telf' => '0416',
            'telefono' => '3345211',
            'direccion' => 'CAGUA',
            'id_especialidad' => 5
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'JOHN',
            'apellidos' => 'MOFFATT',
            'nacionalidad' => 'V',
            'cedula' => 23456767,
            'codigo_telf' => '0414',
            'telefono' => '9987877',
            'direccion' => 'EL CONSEJO',
            'id_especialidad' => 6
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'JAKE',
            'apellidos' => 'GYLLENHAAL',
            'nacionalidad' => 'E',
            'cedula' => 89899913,
            'codigo_telf' => '0424',
            'telefono' => '3353506',
            'direccion' => 'ZUATA',
            'id_especialidad' => 7
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'REBECCA',
            'apellidos' => 'FERGUSON',
            'nacionalidad' => 'E',
            'cedula' => 4565655,
            'codigo_telf' => '0412',
            'telefono' => '6787878',
            'direccion' => 'TEJERIAS',
            'id_especialidad' => 8
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'RYAN',
            'apellidos' => 'REYNOLDS',
            'nacionalidad' => 'E',
            'cedula' => 24345456,
            'codigo_telf' => '0416',
            'telefono' => '7784534',
            'direccion' => 'SAN MATEO',
            'id_especialidad' => 9
        ]);

        DB::table('medicos')->insert([
            'nombres' => 'HIROYUKI',
            'apellidos' => 'SANADA',
            'nacionalidad' => 'V',
            'cedula' => 6511456,
            'codigo_telf' => '0424',
            'telefono' => '5674354',
            'direccion' => 'ZUATA',
            'id_especialidad' => 10
        ]);
		DB::table('medicos')->insert([
            'nombres' => 'ARIYON',
            'apellidos' => 'BAKARE',
            'nacionalidad' => 'V',
            'cedula' => 28282838,
            'codigo_telf' => '0424',
            'telefono' => '5674354',
            'direccion' => 'ZUATA',
            'id_especialidad' => 11
        ]);
    }
}
