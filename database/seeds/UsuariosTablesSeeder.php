<?php

use Illuminate\Database\Seeder;

class UsuariosTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usuarios = array(
        	array(
	        	'nombre' => 'ssanchez',
	        	'password' => bcrypt('123456'),
	        	'tipo' => 1,
	        	'datos' => 2
        	),
        	array(
	        	'nombre' => 'mfong',
	        	'password' => bcrypt('puebla123'),
	        	'tipo' => 3,
	        	'datos' => 4
        	),
        	array(
	        	'nombre' => 'jrodriguez',
	        	'password' => bcrypt('jrn@123'),
	        	'tipo' => 2,
	        	'datos' => 6
        	),
        	array(
	        	'nombre' => 'amatus',
	        	'password' => bcrypt('arma2018'),
	        	'tipo' => 2,
	        	'datos' => 8
        	)
        );
        $direcciones = array(
        	array(
        		'calle' => '25 poniente',
        		'numero_ext' => 1504,
        		'numero_int' => null,
        		'colonia' => 'Los Volcanes',
        		'cp' => 72410
        	),
        	array(
        		'calle' => 'Insurgentes',
        		'numero_ext' => 42,
        		'numero_int' => null,
        		'colonia' => 'El Mayorazgo',
        		'cp' => 72492
        	),
        	array(
        		'calle' => 'Privada Aquiles Serdán',
        		'numero_ext' => 5310,
        		'numero_int' => null,
        		'colonia' => 'San Baltazar Campeche',
        		'cp' => 72550
        	),
        	array(
        		'calle' => 'Rio Suchiate',
        		'numero_ext' => 5722,
        		'numero_int' => null,
        		'colonia' => 'Jardines de San Manuel',
        		'cp' => 72570
        	),
        );
        $datos = array(
        	array(
	        	'nombres' => 'Joel Alejandro',
	        	'apellidos' => 'Sanchez Ortiz',
	        	'telefono' => 2221957237,
	        	'referencia' => null,
	        	'parentezco' => null,
	        	'direccion' => null
	        ),
	        array(
	        	'nombres' => 'Armando',
	        	'apellidos' => 'Sanchez Ortiz',
	        	'telefono' => 2221028301,
	        	'referencia' => 1,
	        	'parentezco' => 2,
	        	'direccion' => 1
	        ),
	        array(
	        	'nombres' => 'Gabriela',
	        	'apellidos' => 'Fong López',
	        	'telefono' => 2223790822,
	        	'referencia' => null,
	        	'parentezco' => null,
	        	'direccion' => null
	        ),
	        array(
	        	'nombres' => 'Magaly',
	        	'apellidos' => 'Fong Juárez',
	        	'telefono' => 2224039421,
	        	'referencia' => 3,
	        	'parentezco' => 1,
	        	'direccion' => 2
	        ),
	        array(
	        	'nombres' => 'Joanna',
	        	'apellidos' => 'Sosa Rodriguez',
	        	'telefono' => 2222452920,
	        	'referencia' => null,
	        	'parentezco' => null,
	        	'direccion' => null
	        ),
	        array(
	        	'nombres' => 'Juan Carlos',
	        	'apellidos' => 'Rodriguez Mercado',
	        	'telefono' => 2223094823,
	        	'referencia' => 5,
	        	'parentezco' => 3,
	        	'direccion' => 3
	        ),
	        array(
	        	'nombres' => 'Alfredo',
	        	'apellidos' => 'Matus Cortes',
	        	'telefono' => 2222595683,
	        	'referencia' => null,
	        	'parentezco' => null,
	        	'direccion' => null
	        ),
	        array(
	        	'nombres' => 'Aldo Rafael',
	        	'apellidos' => 'Matus Angulo',
	        	'telefono' => 2223958359,
	        	'referencia' => 7,
	        	'parentezco' => 3,
	        	'direccion' => 4
	        ),
        );

        foreach($direcciones as $dir){
        	DB::table('direcciones')->insert($dir);
        }
        foreach ($datos as $dato) {
        	DB::table('datos_personales')->insert($dato);
        }
	    foreach($usuarios as $usr){
	        DB::table('usuarios')->insert($usr);
	    }
    }
}
