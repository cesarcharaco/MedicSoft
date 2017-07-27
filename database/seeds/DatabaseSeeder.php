<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PacientesTableSeeder::class);
        $this->call(EspecialidadesTableSeeder::class);
        $this->call(TipoConsultaTableSeeder::class);
        $this->call(MedicosTableSeeder::class);
        $this->call(DiasTableSeeder::class);
        $this->call(TurnosTableSeeder::class);
        $this->call(ConsultasMontosTableSeeder::class);

    }
}
