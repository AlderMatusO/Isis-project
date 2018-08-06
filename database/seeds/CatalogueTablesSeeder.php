<?php

use Illuminate\Database\Seeder;

class CatalogueTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array('administrador', 'mesero', 'cajero');
	    foreach ($data as $tipo) {
        	DB::table('tipos_usuario')->insert([
        		'descripcion' => $tipo
	        ]);
        }

        $data = array('padre/Madre', 'hermano(a)', 'tío(a)');
        
        foreach ($data as $parentezco) {
        	DB::table('parentezcos')->insert([
        		'descripcion' => $parentezco
	        ]);
        }

        $data = array('entrada', 'plato fuerte', 'acompañamiento', 'bebida alcoholica', 'bebida sin alcohol', 'postre');
        
        foreach ($data as $categoria) {
        	DB::table('categorias_producto')->insert([
        		'descripcion' => $categoria
	        ]);
        }

        $data = array('1 Kg.', '1/2 Kg.', '1/4 Kg.', 'Taco', 'Orden', 'Pieza', 'Botella', 'Copa/Vaso/Taza', '1 Litro', 'Jarra(2 L.)');
        
        foreach ($data as $unidad) {
        	DB::table('modos_servicio')->insert([
        		'descripcion' => $unidad
	        ]);
        }

        $data = array('abierto', 'cerrado', 'pagado', 'contabilizado');
        
        foreach ($data as $estados_consumo) {
        	DB::table('estados_consumo')->insert([
        		'descripcion' => $unidad
	        ]);
        }

        $data = array('efectivo', 'tarjeta de crédito', 'tarjeta de débito');
        
        foreach ($data as $metodos_pago) {
        	DB::table('metodos_pago')->insert([
        		'descripcion' => $unidad
	        ]);
        }
    }
}
