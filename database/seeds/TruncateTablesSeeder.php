<?php

use Illuminate\Database\Seeder;

class TruncateTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::select('SET FOREIGN_KEY_CHECKS=0');
    	DB::select('TRUNCATE consultas');
		
    	DB::select('TRUNCATE consultaslab');
		
    	DB::select('TRUNCATE consultas_laboratorios');
		
    	DB::select('TRUNCATE consultas_montos');
		
    	DB::select('TRUNCATE dias');
		
    	DB::select('TRUNCATE especialidades');
		
    	DB::select('TRUNCATE horarios');
		
    	DB::select('TRUNCATE laboratorios');
		
    	DB::select('TRUNCATE materiales');
		
    	DB::select('TRUNCATE materiales_pedidos');
		
    	DB::select('TRUNCATE materiales_recibidos');
		
    	DB::select('TRUNCATE materiales_solicitados');
		
    	DB::select('TRUNCATE medicos');
		
    	DB::select('TRUNCATE migrations');
		
    	DB::select('TRUNCATE oficinas');
		
    	DB::select('TRUNCATE pacientes');
		
    	DB::select('TRUNCATE pacientes_nt');
		
    	DB::select('TRUNCATE password_resets');
		
    	DB::select('TRUNCATE pedidos_oficinas');
		
    	DB::select('TRUNCATE recepcion_materiales');
		
    	DB::select('TRUNCATE relaciones_dias');
		
    	DB::select('TRUNCATE relaciones_semanales');
		
    	DB::select('TRUNCATE tipo_consulta');
		
    	DB::select('TRUNCATE turnos');
		
    	DB::select('TRUNCATE users');
    	DB::select('SET FOREIGN_KEY_CHECKS=1');
    }
}
