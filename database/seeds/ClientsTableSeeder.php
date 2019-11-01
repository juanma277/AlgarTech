<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'nombre' => str_random(10),
            'direccion' => str_random(10),
            'telefono' => str_random(10),
            'tipoCliente' => str_random(10),
            'pais' => str_random(10),
            'departamento' => str_random(10),
            'ciudad' => str_random(10)
        ]);
    }
}
