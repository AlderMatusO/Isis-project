<?php

use Illuminate\Database\Seeder;

class MenuTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productos_generales = array(
        	array(
	        	'nombre' => 'Barbacoa',
	        ),
	        array(
	        	'nombre' => 'Pancita',
	        ),
	        array(
	        	'nombre' => 'Mixiote',
	        ),
	        array(
	        	'nombre' => 'Consomé',
	        ),
	        array(
	        	'nombre' => 'Arroz',
	        ),
	        array(
	        	'nombre' => 'Antojito',
	        ),
	        array(
	        	'nombre' => 'Botana',
	        ),
	        array(
	        	'nombre' => 'Menudencias',
	        ),
	        array(
	        	'nombre' => 'Brandy',
	        ),
	        array(
	        	'nombre' => 'Tequila',
	        ),
	        array(
	        	'nombre' => 'Ron',
	        ),
	        array(
	        	'nombre' => 'Vodka',
	        ),
	        array(
	        	'nombre' => 'Coctel',
	        ),
	        array(
	        	'nombre' => 'Wisky',
	        ),
	        array(
	        	'nombre' => 'Cerveza',
	        ),
	        array(
	        	'nombre' => 'Licor',
	        ),
	        array(
	        	'nombre' => 'Curado',
	        ),
	        array(
	        	'nombre' => 'Bebidas Refrescantes',
	        ),
	        array(
	        	'nombre' => 'Bebidas Calientes',
	        ),
	        array(
	        	'nombre' => 'Postres',
	        )
        );

        $productos = array(
        	array(
        		'nombre' => 'Barbacoa con hueso',
        		'tipo_id' => 1,
        		'categoria_id' => 2,
        		'nombre_imagen' => 'barbacoa.png'
        	),
        	array(
        		'nombre' => 'Barbacoa sin hueso',
        		'tipo_id' => 1,
        		'categoria_id' => 2,
        		'nombre_imagen' => 'barbacoa_sin_hueso.png'
        	),
        	array(
        		'nombre' => 'Barbacoa especial',
        		'tipo_id' => 1,
        		'categoria_id' => 2,
        		'nombre_imagen' => 'barbacoa_especial.png'
        	),
        	array(
        		'nombre' => 'Pancita enchilada',
        		'tipo_id' => 2,
        		'categoria_id' => 2,
        		'nombre_imagen' => 'pancita.png'
        	),
        	array(
        		'nombre' => 'Mixiote de carnero',
        		'tipo_id' => 3,
        		'categoria_id' => 2,
        		'nombre_imagen' => 'mixiote.png'
        	),
        	array(
        		'nombre' => 'Consomé de borrego',
        		'tipo_id' => 4,
        		'categoria_id' => 1,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Arroz blanco',
        		'tipo_id' => 5,
        		'categoria_id' => 3,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Quesadillas',
        		'tipo_id' => 6,
        		'categoria_id' => 3,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Picaditas',
        		'tipo_id' => 6,
        		'categoria_id' => 3,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Tortillas',
        		'tipo_id' => 6,
        		'categoria_id' => 3,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Queso c/ Aguacate',
        		'tipo_id' => 7,
        		'categoria_id' => 3,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Criadillas',
        		'tipo_id' => 8,
        		'categoria_id' => 2,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Hígado',
        		'tipo_id' => 8,
        		'categoria_id' => 2,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Codillos',
        		'tipo_id' => 8,
        		'categoria_id' => 2,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Patitas de Carnero',
        		'tipo_id' => 8,
        		'categoria_id' => 2,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Cabeza de Carnero en Barbacoa',
        		'tipo_id' => 8,
        		'categoria_id' => 2,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Raspadura',
        		'tipo_id' => 8,
        		'categoria_id' => 2,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Torres 10',
        		'tipo_id' => 9,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Magno',
        		'tipo_id' => 9,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Terry',
        		'tipo_id' => 9,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Herradura Reposado',
        		'tipo_id' => 10,
        		'categoria_id' => 4,
        		'nombre_imagen' => null

        	),
        	array(
        		'nombre' => 'Don Julio Reposado',
        		'tipo_id' => 10,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Hornitos Reposado',
        		'tipo_id' => 10,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Tradicional Frío',
        		'tipo_id' => 10,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Appleton Especial',
        		'tipo_id' => 11,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Bacardi Solera',
        		'tipo_id' => 11,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Bacardi Añejo',
        		'tipo_id' => 11,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Bacardi Blanco',
        		'tipo_id' => 11,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Absolut Azúl',
        		'tipo_id' => 12,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Wyborowa',
        		'tipo_id' => 12,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Smirnoff',
        		'tipo_id' => 12,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Anis con Anis',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Bull',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Paloma',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Piedra',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Sangria',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Tom Collin\'s',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Charro Negro',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Rusa',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Michelada',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Chelada',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Clamato s/n Alcohol',
        		'tipo_id' => 13,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Clamato c/n Cerveza',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Clamato c/n Vodka',
        		'tipo_id' => 13,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Buchanan\'s 12 años',
        		'tipo_id' => 14,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Chivas Regal 12 años',
        		'tipo_id' => 14,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Jhonny Walker Etiqueta Roja',
        		'tipo_id' => 14,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Corona',
        		'tipo_id' => 15,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Victoria',
        		'tipo_id' => 15,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Negra Modelo',
        		'tipo_id' => 15,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Modelo Especial',
        		'tipo_id' => 15,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Anis Chinchón',
        		'tipo_id' => 16,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Licor 43',
        		'tipo_id' => 16,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Amareto',
        		'tipo_id' => 16,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Bailey\'s',
        		'tipo_id' => 16,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Sambuca Vacari',
        		'tipo_id' => 16,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Pulque',
        		'tipo_id' => 17,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Jugo de Naranja',
        		'tipo_id' => 18,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Agua de Sabor',
        		'tipo_id' => 18,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Refresco',
        		'tipo_id' => 18,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Limonada',
        		'tipo_id' => 18,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Naranjada',
        		'tipo_id' => 18,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Chocomilk',
        		'tipo_id' => 18,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Café Americano',
        		'tipo_id' => 19,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Café Expreso',
        		'tipo_id' => 19,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Capuccino',
        		'tipo_id' => 19,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Café Lechero',
        		'tipo_id' => 19,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Café de Olla',
        		'tipo_id' => 19,
        		'categoria_id' => 5,
        		'nombre_imagen' => null
        	),
        	array(
        		'nombre' => 'Carajillo',
        		'tipo_id' => 19,
        		'categoria_id' => 4,
        		'nombre_imagen' => null
        	),
        	array(
	        	'nombre' => 'Duraznos',
	        	'tipo_id' => 20,
        		'categoria_id' => 6,
        		'nombre_imagen' => null
	        ),
	        array(
	        	'nombre' => 'Flan',
	        	'tipo_id' => 20,
        		'categoria_id' => 6,
        		'nombre_imagen' => null
	        ),
	        array(
	        	'nombre' => 'Galletas',
	        	'tipo_id' => 20,
        		'categoria_id' => 6,
        		'nombre_imagen' => null
	        )
        );
		$precios = array(
			array(
				'precio' => 440.00,
				'modo_servicio_id' => 1,
				'producto_id' => 1
			),
			array(
				'precio' => 220.00,
				'modo_servicio_id' => 2,
				'producto_id' => 1
			),
			array(
				'precio' => 130.00,
				'modo_servicio_id' => 3,
				'producto_id' => 1
			),
			array(
				'precio' => 540.00,
				'modo_servicio_id' => 1,
				'producto_id' => 2
			),
			array(
				'precio' => 270.00,
				'modo_servicio_id' => 2,
				'producto_id' => 2
			),
			array(
				'precio' => 150.00,
				'modo_servicio_id' => 3,
				'producto_id' => 2
			),
			array(
				'precio' => 35.00,
				'modo_servicio_id' => 4,
				'producto_id' => 2
			),
			array(
				'precio' => 680.00,
				'modo_servicio_id' => 1,
				'producto_id' => 3
			),
			array(
				'precio' => 340.00,
				'modo_servicio_id' => 2,
				'producto_id' => 3
			),
			array(
				'precio' => 190.00,
				'modo_servicio_id' => 3,
				'producto_id' => 3
			),
			array(
				'precio' => 40.00,
				'modo_servicio_id' => 4,
				'producto_id' => 3
			),
			array(
				'precio' => 420.00,
				'modo_servicio_id' => 1,
				'producto_id' => 4
			),
			array(
				'precio' => 420.00,
				'modo_servicio_id' => 2,
				'producto_id' => 4
			),
			array(
				'precio' => 420.00,
				'modo_servicio_id' => 3,
				'producto_id' => 4
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 4,
				'producto_id' => 4
			),
			array(
				'precio' => 95.00,
				'modo_servicio_id' => 6,
				'producto_id' => 5
			),
			array(
				'precio' => 50.00,
				'modo_servicio_id' => 9,
				'producto_id' => 6
			),
			array(
        		'precio' => 30.00,
				'modo_servicio_id' => 5,
				'producto_id' => 7
        	),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 5,
				'producto_id' => 8
			),
			array(
				'precio' => 50.00,
				'modo_servicio_id' => 5,
				'producto_id' => 9
			),
			array(
				'precio' => 2.00,
				'modo_servicio_id' => 6,
				'producto_id' => 10
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 5,
				'producto_id' => 11
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 5,
				'producto_id' => 12
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 5,
				'producto_id' => 13
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 5,
				'producto_id' => 14
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 5,
				'producto_id' => 15
			),
			array(
				'precio' => 120.00,
				'modo_servicio_id' => 6,
				'producto_id' => 16
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 5,
				'producto_id' => 17
			),
			array(
				'precio' => 650.00,
				'modo_servicio_id' => 7,
				'producto_id' => 18
			),
			array(
				'precio' => 65.00,
				'modo_servicio_id' => 8,
				'producto_id' => 18
			),
			array(
				'precio' => 650.00,
				'modo_servicio_id' => 7,
				'producto_id' => 19
			),
			array(
				'precio' => 65.00,
				'modo_servicio_id' => 8,
				'producto_id' => 19
			),
			array(
				'precio' => 600.00,
				'modo_servicio_id' => 7,
				'producto_id' => 20
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 8,
				'producto_id' => 20
			),
			array(
				'precio' => 900.00,
				'modo_servicio_id' => 7,
				'producto_id' => 21
			),
			array(
				'precio' => 90.00,
				'modo_servicio_id' => 8,
				'producto_id' => 21
			),
			array(
				'precio' => 900.00,
				'modo_servicio_id' => 7,
				'producto_id' => 22
			),
			array(
				'precio' => 90.00,
				'modo_servicio_id' => 8,
				'producto_id' => 22
			),
			array(
				'precio' => 650.00,
				'modo_servicio_id' => 7,
				'producto_id' => 23
			),
			array(
				'precio' => 65.00,
				'modo_servicio_id' => 8,
				'producto_id' => 23
			),
			array(
				'precio' => 900.00,
				'modo_servicio_id' => 7,
				'producto_id' => 24
			),
			array(
				'precio' => 90.00,
				'modo_servicio_id' => 8,
				'producto_id' => 24
			),
			array(
				'precio' => 550.00,
				'modo_servicio_id' => 7,
				'producto_id' => 25
			),
			array(
				'precio' => 55.00,
				'modo_servicio_id' => 8,
				'producto_id' => 25
			),
			array(
				'precio' => 600.00,
				'modo_servicio_id' => 7,
				'producto_id' => 26
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 8,
				'producto_id' => 26
			),
			array(
				'precio' => 550.00,
				'modo_servicio_id' => 7,
				'producto_id' => 27
			),
			array(
				'precio' => 55.00,
				'modo_servicio_id' => 8,
				'producto_id' => 27
			),
			array(
				'precio' => 500.00,
				'modo_servicio_id' => 7,
				'producto_id' => 28
			),
			array(
				'precio' => 50.00,
				'modo_servicio_id' => 8,
				'producto_id' => 28
			),
			array(
				'precio' => 650.00,
				'modo_servicio_id' => 7,
				'producto_id' => 29
			),
			array(
				'precio' => 65.00,
				'modo_servicio_id' => 8,
				'producto_id' => 29
			),
			array(
				'precio' => 550.00,
				'modo_servicio_id' => 7,
				'producto_id' => 30
			),
			array(
				'precio' => 55.00,
				'modo_servicio_id' => 8,
				'producto_id' => 30
			),
			array(
				'precio' => 500.00,
				'modo_servicio_id' => 7,
				'producto_id' => 31
			),
			array(
				'precio' => 50.00,
				'modo_servicio_id' => 8,
				'producto_id' => 31
			),
			array(
				'precio' => 70.00,
				'modo_servicio_id' => 8,
				'producto_id' => 32
			),
			array(
				'precio' => 80.00,
				'modo_servicio_id' => 8,
				'producto_id' => 33
			),
			array(
				'precio' => 70.00,
				'modo_servicio_id' => 8,
				'producto_id' => 34
			),
			array(
				'precio' => 80.00,
				'modo_servicio_id' => 8,
				'producto_id' => 35
			),
			array(
				'precio' => 80.00,
				'modo_servicio_id' => 8,
				'producto_id' => 36
			),
			array(
				'precio' => 70.00,
				'modo_servicio_id' => 8,
				'producto_id' => 37
			),
			array(
				'precio' => 70.00,
				'modo_servicio_id' => 8,
				'producto_id' => 38
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 8,
				'producto_id' => 39
			),
			array(
				'precio' => 35.00,
				'modo_servicio_id' => 8,
				'producto_id' => 40
			),
			array(
				'precio' => 35.00,
				'modo_servicio_id' => 8,
				'producto_id' => 41
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 8,
				'producto_id' => 42
			),
			array(
				'precio' => 70.00,
				'modo_servicio_id' => 8,
				'producto_id' => 43
			),
			array(
				'precio' => 80.00,
				'modo_servicio_id' => 8,
				'producto_id' => 44
			),
			array(
				'precio' => 1200.00,
				'modo_servicio_id' => 7,
				'producto_id' => 45
			),
			array(
				'precio' => 120.00,
				'modo_servicio_id' => 8,
				'producto_id' => 45
			),
			array(
				'precio' => 1100.00,
				'modo_servicio_id' => 7,
				'producto_id' => 46
			),
			array(
				'precio' => 110.00,
				'modo_servicio_id' => 8,
				'producto_id' => 46
			),
			array(
				'precio' => 650.00,
				'modo_servicio_id' => 7,
				'producto_id' => 47
			),
			array(
				'precio' => 65.00,
				'modo_servicio_id' => 8,
				'producto_id' => 47
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 48
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 49
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 50
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 51
			),
			array(
				'precio' => 70.00,
				'modo_servicio_id' => 8,
				'producto_id' => 52
			),
			array(
				'precio' => 80.00,
				'modo_servicio_id' => 8,
				'producto_id' => 53
			),
			array(
				'precio' => 80.00,
				'modo_servicio_id' => 8,
				'producto_id' => 54
			),
			array(
				'precio' => 80.00,
				'modo_servicio_id' => 8,
				'producto_id' => 55
			),
			array(
				'precio' => 80.00,
				'modo_servicio_id' => 8,
				'producto_id' => 56
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 8,
				'producto_id' => 57
			),
			array(
				'precio' => 50.00,
				'modo_servicio_id' => 9,
				'producto_id' => 57
			),
			array(
				'precio' => 90.00,
				'modo_servicio_id' => 10,
				'producto_id' => 57
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 8,
				'producto_id' => 58
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 9,
				'producto_id' => 58
			),
			array(
				'precio' => 100.00,
				'modo_servicio_id' => 10,
				'producto_id' => 58
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 8,
				'producto_id' => 59
			),
			array(
				'precio' => 45.00,
				'modo_servicio_id' => 9,
				'producto_id' => 59
			),
			array(
				'precio' => 70.00,
				'modo_servicio_id' => 10,
				'producto_id' => 59
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 8,
				'producto_id' => 60
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 61
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 62
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 63
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 8,
				'producto_id' => 64
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 8,
				'producto_id' => 65
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 66
			),
			array(
				'precio' => 30.00,
				'modo_servicio_id' => 8,
				'producto_id' => 67
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 8,
				'producto_id' => 68
			),
			array(
				'precio' => 60.00,
				'modo_servicio_id' => 8,
				'producto_id' => 69
			),
			array(
				'precio' => 45.00,
				'modo_servicio_id' => 5,
				'producto_id' => 70
			),
			array(
				'precio' => 35.00,
				'modo_servicio_id' => 6,
				'producto_id' => 71
			),
			array(
				'precio' => 25.00,
				'modo_servicio_id' => 5,
				'producto_id' => 72
			)
		);

		foreach($productos_generales as $prod_gral)
		{
			DB::Table('productos_generales')->insert($prod_gral);
		}
		foreach($productos as $prod)
		{
			DB::Table('productos')->insert($prod);
		}
		foreach($precios as $precio)
		{
			DB::Table('precios_producto')->insert($precio);
		}
    }
}
