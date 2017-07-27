<?php

use Illuminate\Database\Seeder;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->insert([
            'nombres' => 'ANA JOSEFINA',
            'apellidos' => 'RAMIREZ',
            'nacionalidad' => 'V',
            'cedula' => 12345678,
            'codigo_telf' => '0416',
            'telefono' => '1233211',
            'direccion' => 'LA VICTORIA',
            'titular' => 'NO',
            'institucion' => 'MPPESCT'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'MANOLO JOSE',
            'apellidos' => 'POCHE CORREA',
            'nacionalidad' => 'V',
            'cedula' => 2345456,
            'codigo_telf' => '0426',
            'telefono' => '1233341',
            'direccion' => 'LA VICTORIA',
            'titular' => 'SI',
            'institucion' => 'MPPESCT'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'CARMEN MARIA',
            'apellidos' => 'COLMENAREZ SANCHEZ',
            'nacionalidad' => 'V',
            'cedula' => 3454454,
            'codigo_telf' => '0412',
            'telefono' => '4332233',
            'direccion' => 'MARACAY',
            'titular' => 'SI',
            'institucion' => 'MPPESCT'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'GLENDYS MARIA',
            'apellidos' => 'MUÑOZ GAMEZ',
            'nacionalidad' => 'V',
            'cedula' => 7899898,
            'codigo_telf' => '0416',
            'telefono' => '2343666',
            'direccion' => 'LA VICTORIA',
            'titular' => 'SI',
            'institucion' => 'MPPESCT'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'KEVIN MATHIAS',
            'apellidos' => 'RON ROJAS',
            'nacionalidad' => 'V',
            'cedula' => 19899789,
            'codigo_telf' => '0416',
            'telefono' => '3345211',
            'direccion' => 'CAGUA',
            'titular' => 'SI',
            'institucion' => 'MPPESCT'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'CARLOS LUIS',
            'apellidos' => 'MARTINEZ AGUILAR',
            'nacionalidad' => 'V',
            'cedula' => 23456767,
            'codigo_telf' => '0414',
            'telefono' => '9987877',
            'direccion' => 'EL CONSEJO',
            'titular' => 'NO',
            'institucion' => 'MPPE'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'SHAKIRA',
            'apellidos' => 'MEBARAK',
            'nacionalidad' => 'E',
            'cedula' => 89899913,
            'codigo_telf' => '0424',
            'telefono' => '3353506',
            'direccion' => 'ZUATA',
            'titular' => 'NO',
            'institucion' => 'MPPE'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'RICARDO',
            'apellidos' => 'ARJONA',
            'nacionalidad' => 'E',
            'cedula' => 4565655,
            'codigo_telf' => '0412',
            'telefono' => '6787878',
            'direccion' => 'TEJERIAS',
            'titular' => 'SI',
            'institucion' => 'MPPE'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'JUSTIN',
            'apellidos' => 'BIEBER',
            'nacionalidad' => 'E',
            'cedula' => 24345456,
            'codigo_telf' => '0416',
            'telefono' => '7784534',
            'direccion' => 'SAN MATEO',
            'titular' => 'SI',
            'institucion' => 'MPPE'
        ]);

        DB::table('pacientes')->insert([
            'nombres' => 'ALANISSE',
            'apellidos' => 'MORRISETTE',
            'nacionalidad' => 'V',
            'cedula' => 6511456,
            'codigo_telf' => '0424',
            'telefono' => '5674354',
            'direccion' => 'ZUATA',
            'titular' => 'SI',
            'institucion' => 'MPPE'
        ]);

    }
}
