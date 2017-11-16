<?php

use Illuminate\Database\Seeder;

class PacientesNtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes_nt')->insert([
            'nombres' => 'MARGARITA',
            'apellidos' => 'ACOSTA',
            'nacionalidad' => 'V',
            'cedula' => 3935010,
            'codigo_telf' => '0244',
            'telefono' => '9893891',
            'direccion' => 'LA VICTORIA',
            'edad' => '65',
            'genero' => 'F',
            'titular' => 'No',
            'parentesco' => 'Madre',
            'id_paciente' => 1
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'EDGAR',
            'apellidos' => 'ROMAN',
            'nacionalidad' => 'V',
            'cedula' => 8589896,
            'codigo_telf' => '0416',
            'telefono' => '7129542',
            'direccion' => 'LA VICTORIA',
            'edad' => '54',
            'genero' => 'M',
            'titular' => 'No',
            'parentesco' => 'Padre',
            'id_paciente' => 2
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'LAILY',
            'apellidos' => 'CHIRINOS',
            'nacionalidad' => 'V',
            'cedula' => 28224702,
            'codigo_telf' => '0414',
            'telefono' => '1718518',
            'direccion' => 'MARACAY',
            'edad' => '16',
            'genero' => 'F',
            'titular' => 'No',
            'parentesco' => 'Hijo(a)',
            'id_paciente' => 3
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'IRMA',
            'apellidos' => 'ÑAÑES',
            'nacionalidad' => 'V',
            'cedula' => 8811394,
            'codigo_telf' => '0414',
            'telefono' => '1048996',
            'direccion' => 'CAGUA',
            'edad' => '53',
            'genero' => 'F',
            'titular' => 'No',
            'parentesco' => 'Madre',
            'id_paciente' => 4
        ]);

        //---titulares dentro de pacientes_nt
        DB::table('pacientes_nt')->insert([
            'nombres' => 'ANA JOSEFINA',
            'apellidos' => 'RAMIREZ',
            'nacionalidad' => 'V',
            'cedula' => 12345678,
            'codigo_telf' => '0416',
            'telefono' => '1233211',
            'direccion' => 'LA VICTORIA',
            'edad' => '40',
            'genero' => 'F',
            'titular' => 'SI',
            'id_paciente' => 1
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'MANOLO JOSE',
            'apellidos' => 'POCHE CORREA',
            'nacionalidad' => 'V',
            'cedula' => 2345456,
            'codigo_telf' => '0426',
            'telefono' => '1233341',
            'direccion' => 'LA VICTORIA',
            'edad' => '50',
            'genero' => 'M',
            'titular' => 'SI',
            'id_paciente' => 2
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'CARMEN MARIA',
            'apellidos' => 'COLMENAREZ SANCHEZ',
            'nacionalidad' => 'V',
            'cedula' => 3454454,
            'codigo_telf' => '0412',
            'telefono' => '4332233',
            'direccion' => 'MARACAY',
            'edad' => '45',
            'genero' => 'F',
            'titular' => 'SI',
            'id_paciente' => 3
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'GLENDYS MARIA',
            'apellidos' => 'MUÑOZ GAMEZ',
            'nacionalidad' => 'V',
            'cedula' => 7899898,
            'codigo_telf' => '0416',
            'telefono' => '2343666',
            'direccion' => 'LA VICTORIA',
            'edad' => '40',
            'genero' => 'F',
            'titular' => 'SI',
            'id_paciente' => 4
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'KEVIN MATHIAS',
            'apellidos' => 'RON ROJAS',
            'nacionalidad' => 'V',
            'cedula' => 19899789,
            'codigo_telf' => '0416',
            'telefono' => '3345211',
            'direccion' => 'CAGUA',
            'edad' => '30',
            'genero' => 'M',
            'titular' => 'SI',
            'id_paciente' => 5
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'CARLOS LUIS',
            'apellidos' => 'MARTINEZ AGUILAR',
            'nacionalidad' => 'V',
            'cedula' => 23456767,
            'codigo_telf' => '0414',
            'telefono' => '9987877',
            'direccion' => 'EL CONSEJO',
            'edad' => '38',
            'genero' => 'M',
            'titular' => 'SI',
            'id_paciente' => 6
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'SHAKIRA',
            'apellidos' => 'MEBARAK',
            'nacionalidad' => 'E',
            'cedula' => 89899913,
            'codigo_telf' => '0424',
            'telefono' => '3353506',
            'direccion' => 'ZUATA',
            'edad' => '49',
            'genero' => 'F',
            'titular' => 'SI',
            'id_paciente' => 7
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'RICARDO',
            'apellidos' => 'ARJONA',
            'nacionalidad' => 'E',
            'cedula' => 4565655,
            'codigo_telf' => '0412',
            'telefono' => '6787878',
            'direccion' => 'TEJERIAS',
            'edad' => '63',
            'genero' => 'M',
            'titular' => 'SI',
            'id_paciente' => 8
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'JUSTIN',
            'apellidos' => 'BIEBER',
            'nacionalidad' => 'E',
            'cedula' => 24345456,
            'codigo_telf' => '0416',
            'telefono' => '7784534',
            'direccion' => 'SAN MATEO',
            'edad' => '28',
            'genero' => 'M',
            'titular' => 'SI',
            'id_paciente' => 9
        ]);

        DB::table('pacientes_nt')->insert([
            'nombres' => 'ALANISSE',
            'apellidos' => 'MORRISETTE',
            'nacionalidad' => 'V',
            'cedula' => 6511456,
            'codigo_telf' => '0424',
            'telefono' => '5674354',
            'direccion' => 'ZUATA',
            'edad' => '40',
            'genero' => 'F',
            'titular' => 'SI',
            'id_paciente' => 10
        ]);

        
    }
}
