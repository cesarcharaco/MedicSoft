<?php

use Illuminate\Database\Seeder;

class PedidosOficinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$i=1;
    	$codigo=$i.''.date('Y').''.date('m').''.date('d');
        DB::table('pedidos_oficinas')->insert([
            'id_oficina' => 1,
            'solicitante' => 'JUAN PEREZ',
            'nacionalidad' => 'V',
            'cedula' => '12343233',
            'fecha' => date('Y-m-d'),
            'codigo' => $codigo
        ]);

        	DB::table('materiales_pedidos')->insert([
            'id_pedido' => 1,
            'id_material' => 1,
            'cantidad' => '30'
        	]);

        	DB::table('materiales_pedidos')->insert([
            'id_pedido' => 1,
            'id_material' => 2,
            'cantidad' => '3'
        	]);
        $i=2;
    	$codigo=$i.''.date('Y').''.date('m').''.date('d');
        DB::table('pedidos_oficinas')->insert([
            'id_oficina' => 2,
            'solicitante' => 'MARÍA GOMEZ',
            'nacionalidad' => 'V',
            'cedula' => '12332222',
            'fecha' => date('Y-m-d'),
            'codigo' => $codigo
        ]);

        	DB::table('materiales_pedidos')->insert([
            'id_pedido' => 2,
            'id_material' => 3,
            'cantidad' => '20'
        	]);

        	DB::table('materiales_pedidos')->insert([
            'id_pedido' => 2,
            'id_material' => 3,
            'cantidad' => '45'
        	]);
    }
}
