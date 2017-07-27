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
        	'consulta' => 'ECOSONOGRAMA ABDOMINAL',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA DE MAMA',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA RENAL',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA DE PRÓSTATA',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA DE TIROIDE',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA DE PARTES BLANDAS',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA TESTICULAR',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA PÉLVICO',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA GINECOLÓGICO',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'ECOSONOGRAMA OBSTÉTRICO',
            'id_especialidad' => 10
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO HEMATOLOGÍA COMPLETA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO GLICEMIA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO ÚREA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO CREATININA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO COLESTEROL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO TRIGLICÉRIDOS',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO HDL-COLESTEROL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO LDL-COLESTEROL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO ÁCIDO ÚRICO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO TGO/ASAT',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO TGP/ALAT',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO BILIRRUBINA TOTAL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO BILIRRUBINA DIRECTA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO BILIRRUBINA INDIRECTA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO PROTEÍNAS TOTALES',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO ALBUMINA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO GLOBULINAS',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO CALCIO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO FÓSFORO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO ÁCIDO ÚRICO/CREATININA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO CALCIO/CREATININA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO FÓSFORO/CREATININA',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO RATEST',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO PERFIL TIROIDEO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO PERFIL LIPÍDICO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO UROANÁLISIS(ORINA)',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO COPROANÁLISIS(HECES)',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO SANGRE OCULTA EN HECES',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO A.S.T.O.',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO PRE-OPERATORIOS',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO ROTAVIRUS EN HECES',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO VSG',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO VDRL',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO H.I.V.',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO SEROLOGÍA DE DENGUE',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO PT-PTT',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO PCR',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO HCG(PRUEBA DE EMBARAZO)',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO GRUPO SANGUÍNEO',
            'id_especialidad' => 11
        ]);
        DB::table('tipo_consulta')->insert([
        	'consulta' => 'LABORATORIO CLÍNICO PERFIL HEPÁTICO',
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
