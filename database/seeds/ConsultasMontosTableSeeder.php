<?php

use Illuminate\Database\Seeder;

class ConsultasMontosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consultas_montos')->insert([
            'id_tipoconsulta' => 1,
            'monto' => 10000,
            'fecha' => date('Y-m-d')
        ]);
        DB::table('consultas_montos')->insert([
            'id_tipoconsulta' => 2,
            'monto' => 10000,
            'fecha' => date('Y-m-d')
        ]);
        DB::table('consultas_montos')->insert([
            'id_tipoconsulta' => 3,
            'monto' => 10000,
            'fecha' => date('Y-m-d')
        ]);
    }
}
