<?php

use Illuminate\Database\Seeder;

class TipoConsultaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'MEDICINA GENERAL',
            'id_especialidad' => 1
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'MEDICINA INTERNA',
            'id_especialidad' => 2
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PEDIATRÍA',
            'id_especialidad' => 3
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'GINECOLOGÍA',
            'id_especialidad' => 4
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'DERMATOLOGÍA',
            'id_especialidad' => 5
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'TRAUMATOLOGÍA',
            'id_especialidad' => 6
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'NEUMONOLOGÍA',
            'id_especialidad' => 7
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'FISIATRÍA',
            'id_especialidad' => 8
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PSICÓLOGO',
            'id_especialidad' => 9
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO ABDOMINAL',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO DE MAMA',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO RENAL',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO DE PRÓSTATA',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO DE TIROIDE',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO DE PARTES BLANDAS',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO TESTICULAR',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO PÉLVICO',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO GINECOLÓGICO',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECO OBSTÉTRICO',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
            'consulta' => 'LABORATORIO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'HEMATOLOGÍA COMPLETA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'GLICEMIA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ÚREA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'CREATININA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'COLESTEROL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'TRIGLICÉRIDOS',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'HDL-COLESTEROL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LDL-COLESTEROL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ÁCIDO ÚRICO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'TGO/ASAT',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'TGP/ALAT',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'BILIRRUBINA TOTAL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'BILIRRUBINA DIRECTA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'BILIRRUBINA INDIRECTA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PROTEÍNAS TOTALES',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ALBUMINA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'GLOBULINAS',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'CALCIO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'FÓSFORO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ÁCIDO ÚRICO/CREATININA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'CALCIO/CREATININA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'FÓSFORO/CREATININA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'RATEST',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PERFIL TIROIDEO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PERFIL LIPÍDICO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'UROANÁLISIS(ORINA)',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'COPROANÁLISIS(HECES)',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'SANGRE OCULTA EN HECES',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'A.S.T.O.',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PRE-OPERATORIOS',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ROTAVIRUS EN HECES',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'VSG',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'VDRL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'H.I.V.',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'SEROLOGÍA DE DENGUE',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PT-PTT',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PCR',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'HCG(PRUEBA DE EMBARAZO)',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'GRUPO SANGUÍNEO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PERFIL HEPÁTICO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'PRUEBAS ESPECIALES',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'GLICEMIA BASAL Y POST PANDRIAL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ELECTROLITROS EN SANGRE',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'TOMA DE MUESTRA DE CITOLOGÍA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'HORMONAS FEMENINAS',
            'id_especialidad' => 11
        ]);


    }
}
