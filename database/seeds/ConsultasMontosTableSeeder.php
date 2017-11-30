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
        for ($i=1; $i <=65; $i++) { 
            DB::table('consultas_montos')->insert([
                'id_tipoconsulta' => $i,
                'monto' => 10000,
                'fecha' => date('Y-m-d')
            ]);
            
        }
        
    }
}
