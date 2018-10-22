<?php

use Illuminate\Database\Seeder;

class MesasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $secciones = ['a','b','c','d','e'];

        foreach($secciones as $seccion)
        {
            for($i=0; $i<5; $i++)
            {
                DB::Table('mesas')
                ->insert([
                    'nombre' => $seccion.($i+1)
                ]);
            }
        }
    }
}
