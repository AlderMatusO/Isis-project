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
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Pancita',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Mixiote',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Consomé',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Arroz',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Antojito',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Botana',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Menudencias',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Brandy',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Tequila',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Ron',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Vodka',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Coctel',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Wisky',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Cerveza',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Licor',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Curado',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Bebidas Refrescantes',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Bebidas Calientes',
	        	'ruta_imagen' => null,
	        ),
	        array(
	        	'nombre' => 'Postres',
	        	'ruta_imagen' => null,
	        )
        );

        $productos = array(
        	array(
        		'nombre' => 'Barbacoa con hueso',
        		'tipo' => 1,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Barbacoa sin hueso',
        		'tipo' => 1,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Barbacoa especial',
        		'tipo' => 1,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Pancita enchilada',
        		'tipo' => 2,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Mixiote de carnero',
        		'tipo' => 3,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Consomé de borrego',
        		'tipo' => 4,
        		'categoria' => 1
        	),
        	array(
        		'nombre' => 'Arroz blanco',
        		'tipo' => 5,
        		'categoria' => 3
        	),
        	array(
        		'nombre' => 'Quesadillas',
        		'tipo' => 6,
        		'categoria' => 3
        	),
        	array(
        		'nombre' => 'Picaditas',
        		'tipo' => 6,
        		'categoria' => 3
        	),
        	array(
        		'nombre' => 'Tortillas',
        		'tipo' => 6,
        		'categoria' => 3
        	),
        	array(
        		'nombre' => 'Queso c/ Aguacate',
        		'tipo' => 7,
        		'categoria' => 3
        	),
        	array(
        		'nombre' => 'Criadillas',
        		'tipo' => 8,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Hígado',
        		'tipo' => 8,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Codillos',
        		'tipo' => 8,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Patitas de Carnero',
        		'tipo' => 8,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Cabeza de Carnero en Barbacoa',
        		'tipo' => 8,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Raspadura',
        		'tipo' => 8,
        		'categoria' => 2
        	),
        	array(
        		'nombre' => 'Torres 10',
        		'tipo' => 9,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Magno',
        		'tipo' => 9,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Terry',
        		'tipo' => 9,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Herradura Reposado',
        		'tipo' => 10,
        		'categoria' => 4

        	),
        	array(
        		'nombre' => 'Don Julio Reposado',
        		'tipo' => 10,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Hornitos Reposado',
        		'tipo' => 10,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Tradicional Frío',
        		'tipo' => 10,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Appleton Especial',
        		'tipo' => 11,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Bacardi Solera',
        		'tipo' => 11,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Bacardi Añejo',
        		'tipo' => 11,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Bacardi Blanco',
        		'tipo' => 11,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Absolut Azúl',
        		'tipo' => 12,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Wyborowa',
        		'tipo' => 12,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Smirnoff',
        		'tipo' => 12,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Anis con Anis',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Bull',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Paloma',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Piedra',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Sangria',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Tom Collin\'s',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Charro Negro',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Rusa',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Michelada',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Chelada',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Clamato s/n Alcohol',
        		'tipo' => 13,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Clamato c/n Cerveza',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Clamato c/n Vodka',
        		'tipo' => 13,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Buchanan\'s 12 años',
        		'tipo' => 14,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Chivas Regal 12 años',
        		'tipo' => 14,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Jhonny Walker Etiqueta Roja',
        		'tipo' => 14,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Corona',
        		'tipo' => 15,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Victoria',
        		'tipo' => 15,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Negra Modelo',
        		'tipo' => 15,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Modelo Especial',
        		'tipo' => 15,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Anis Chinchón',
        		'tipo' => 16,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Licor 43',
        		'tipo' => 16,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Amareto',
        		'tipo' => 16,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Bailey\'s',
        		'tipo' => 16,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Sambuca Vacari',
        		'tipo' => 16,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Pulque',
        		'tipo' => 17,
        		'categoria' => 4
        	),
        	array(
        		'nombre' => 'Jugo de Naranja',
        		'tipo' => 18,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Agua de Sabor',
        		'tipo' => 18,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Refresco',
        		'tipo' => 18,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Limonada',
        		'tipo' => 18,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Naranjada',
        		'tipo' => 18,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Chocomilk',
        		'tipo' => 18,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Café Americano',
        		'tipo' => 19,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Café Expreso',
        		'tipo' => 19,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Capuccino',
        		'tipo' => 19,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Café Lechero',
        		'tipo' => 19,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Café de Olla',
        		'tipo' => 19,
        		'categoria' => 5
        	),
        	array(
        		'nombre' => 'Carajillo',
        		'tipo' => 19,
        		'categoria' => 4
        	),
        	array(
	        	'nombre' => 'Duraznos',
	        	'tipo' => 20,
        		'categoria' => 6
	        ),
	        array(
	        	'nombre' => 'Flan',
	        	'tipo' => 20,
        		'categoria' => 6
	        ),
	        array(
	        	'nombre' => 'Galletas',
	        	'tipo' => 20,
        		'categoria' => 6
	        )
        );
		$precios = array(
			array(
				'precio' => 440.00,
				'modo_servicio' => 1,
				'producto' => 1
			),
			array(
				'precio' => 220.00,
				'modo_servicio' => 2,
				'producto' => 1
			),
			array(
				'precio' => 130.00,
				'modo_servicio' => 3,
				'producto' => 1
			),
			array(
				'precio' => 540.00,
				'modo_servicio' => 1,
				'producto' => 2
			),
			array(
				'precio' => 270.00,
				'modo_servicio' => 2,
				'producto' => 2
			),
			array(
				'precio' => 150.00,
				'modo_servicio' => 3,
				'producto' => 2
			),
			array(
				'precio' => 35.00,
				'modo_servicio' => 4,
				'producto' => 2
			),
			array(
				'precio' => 680.00,
				'modo_servicio' => 1,
				'producto' => 3
			),
			array(
				'precio' => 340.00,
				'modo_servicio' => 2,
				'producto' => 3
			),
			array(
				'precio' => 190.00,
				'modo_servicio' => 3,
				'producto' => 3
			),
			array(
				'precio' => 40.00,
				'modo_servicio' => 4,
				'producto' => 3
			),
			array(
				'precio' => 420.00,
				'modo_servicio' => 1,
				'producto' => 4
			),
			array(
				'precio' => 420.00,
				'modo_servicio' => 2,
				'producto' => 4
			),
			array(
				'precio' => 420.00,
				'modo_servicio' => 3,
				'producto' => 4
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 4,
				'producto' => 4
			),
			array(
				'precio' => 95.00,
				'modo_servicio' => 6,
				'producto' => 5
			),
			array(
				'precio' => 50.00,
				'modo_servicio' => 9,
				'producto' => 6
			),
			array(
        		'precio' => 30.00,
				'modo_servicio' => 5,
				'producto' => 7
        	),
			array(
				'precio' => 60.00,
				'modo_servicio' => 5,
				'producto' => 8
			),
			array(
				'precio' => 50.00,
				'modo_servicio' => 5,
				'producto' => 9
			),
			array(
				'precio' => 2.00,
				'modo_servicio' => 6,
				'producto' => 10
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 5,
				'producto' => 11
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 5,
				'producto' => 12
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 5,
				'producto' => 13
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 5,
				'producto' => 14
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 5,
				'producto' => 15
			),
			array(
				'precio' => 120.00,
				'modo_servicio' => 6,
				'producto' => 16
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 5,
				'producto' => 17
			),
			array(
				'precio' => 650.00,
				'modo_servicio' => 7,
				'producto' => 18
			),
			array(
				'precio' => 65.00,
				'modo_servicio' => 8,
				'producto' => 18
			),
			array(
				'precio' => 650.00,
				'modo_servicio' => 7,
				'producto' => 19
			),
			array(
				'precio' => 65.00,
				'modo_servicio' => 8,
				'producto' => 19
			),
			array(
				'precio' => 600.00,
				'modo_servicio' => 7,
				'producto' => 20
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 8,
				'producto' => 20
			),
			array(
				'precio' => 900.00,
				'modo_servicio' => 7,
				'producto' => 21
			),
			array(
				'precio' => 90.00,
				'modo_servicio' => 8,
				'producto' => 21
			),
			array(
				'precio' => 900.00,
				'modo_servicio' => 7,
				'producto' => 22
			),
			array(
				'precio' => 90.00,
				'modo_servicio' => 8,
				'producto' => 22
			),
			array(
				'precio' => 650.00,
				'modo_servicio' => 7,
				'producto' => 23
			),
			array(
				'precio' => 65.00,
				'modo_servicio' => 8,
				'producto' => 23
			),
			array(
				'precio' => 900.00,
				'modo_servicio' => 7,
				'producto' => 24
			),
			array(
				'precio' => 90.00,
				'modo_servicio' => 8,
				'producto' => 24
			),
			array(
				'precio' => 550.00,
				'modo_servicio' => 7,
				'producto' => 25
			),
			array(
				'precio' => 55.00,
				'modo_servicio' => 8,
				'producto' => 25
			),
			array(
				'precio' => 600.00,
				'modo_servicio' => 7,
				'producto' => 26
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 8,
				'producto' => 26
			),
			array(
				'precio' => 550.00,
				'modo_servicio' => 7,
				'producto' => 27
			),
			array(
				'precio' => 55.00,
				'modo_servicio' => 8,
				'producto' => 27
			),
			array(
				'precio' => 500.00,
				'modo_servicio' => 7,
				'producto' => 28
			),
			array(
				'precio' => 50.00,
				'modo_servicio' => 8,
				'producto' => 28
			),
			array(
				'precio' => 650.00,
				'modo_servicio' => 7,
				'producto' => 29
			),
			array(
				'precio' => 65.00,
				'modo_servicio' => 8,
				'producto' => 29
			),
			array(
				'precio' => 550.00,
				'modo_servicio' => 7,
				'producto' => 30
			),
			array(
				'precio' => 55.00,
				'modo_servicio' => 8,
				'producto' => 30
			),
			array(
				'precio' => 500.00,
				'modo_servicio' => 7,
				'producto' => 31
			),
			array(
				'precio' => 50.00,
				'modo_servicio' => 8,
				'producto' => 31
			),
			array(
				'precio' => 70.00,
				'modo_servicio' => 8,
				'producto' => 32
			),
			array(
				'precio' => 80.00,
				'modo_servicio' => 8,
				'producto' => 33
			),
			array(
				'precio' => 70.00,
				'modo_servicio' => 8,
				'producto' => 34
			),
			array(
				'precio' => 80.00,
				'modo_servicio' => 8,
				'producto' => 35
			),
			array(
				'precio' => 80.00,
				'modo_servicio' => 8,
				'producto' => 36
			),
			array(
				'precio' => 70.00,
				'modo_servicio' => 8,
				'producto' => 37
			),
			array(
				'precio' => 70.00,
				'modo_servicio' => 8,
				'producto' => 38
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 8,
				'producto' => 39
			),
			array(
				'precio' => 35.00,
				'modo_servicio' => 8,
				'producto' => 40
			),
			array(
				'precio' => 35.00,
				'modo_servicio' => 8,
				'producto' => 41
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 8,
				'producto' => 42
			),
			array(
				'precio' => 70.00,
				'modo_servicio' => 8,
				'producto' => 43
			),
			array(
				'precio' => 80.00,
				'modo_servicio' => 8,
				'producto' => 44
			),
			array(
				'precio' => 1200.00,
				'modo_servicio' => 7,
				'producto' => 45
			),
			array(
				'precio' => 120.00,
				'modo_servicio' => 8,
				'producto' => 45
			),
			array(
				'precio' => 1100.00,
				'modo_servicio' => 7,
				'producto' => 46
			),
			array(
				'precio' => 110.00,
				'modo_servicio' => 8,
				'producto' => 46
			),
			array(
				'precio' => 650.00,
				'modo_servicio' => 7,
				'producto' => 47
			),
			array(
				'precio' => 65.00,
				'modo_servicio' => 8,
				'producto' => 47
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 48
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 49
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 50
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 51
			),
			array(
				'precio' => 70.00,
				'modo_servicio' => 8,
				'producto' => 52
			),
			array(
				'precio' => 80.00,
				'modo_servicio' => 8,
				'producto' => 53
			),
			array(
				'precio' => 80.00,
				'modo_servicio' => 8,
				'producto' => 54
			),
			array(
				'precio' => 80.00,
				'modo_servicio' => 8,
				'producto' => 55
			),
			array(
				'precio' => 80.00,
				'modo_servicio' => 8,
				'producto' => 56
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 8,
				'producto' => 57
			),
			array(
				'precio' => 50.00,
				'modo_servicio' => 9,
				'producto' => 57
			),
			array(
				'precio' => 90.00,
				'modo_servicio' => 10,
				'producto' => 57
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 8,
				'producto' => 58
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 9,
				'producto' => 58
			),
			array(
				'precio' => 100.00,
				'modo_servicio' => 10,
				'producto' => 58
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 8,
				'producto' => 59
			),
			array(
				'precio' => 45.00,
				'modo_servicio' => 9,
				'producto' => 59
			),
			array(
				'precio' => 70.00,
				'modo_servicio' => 10,
				'producto' => 59
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 8,
				'producto' => 60
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 61
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 62
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 63
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 8,
				'producto' => 64
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 8,
				'producto' => 65
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 66
			),
			array(
				'precio' => 30.00,
				'modo_servicio' => 8,
				'producto' => 67
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 8,
				'producto' => 68
			),
			array(
				'precio' => 60.00,
				'modo_servicio' => 8,
				'producto' => 69
			),
			array(
				'precio' => 45.00,
				'modo_servicio' => 5,
				'producto' => 70
			),
			array(
				'precio' => 35.00,
				'modo_servicio' => 6,
				'producto' => 71
			),
			array(
				'precio' => 25.00,
				'modo_servicio' => 5,
				'producto' => 72
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
