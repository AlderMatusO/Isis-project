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
	        	'activo' => true,
	        	'tipo_id' => 1,
	        	'datos_id' => 2
        	),
        	array(
	        	'nombre' => 'mfong',
	        	'password' => bcrypt('puebla123'),
	        	'activo' => true,
	        	'tipo_id' => 3,
	        	'datos_id' => 4
        	),
        	array(
	        	'nombre' => 'jrodriguez',
	        	'password' => bcrypt('jrn@123'),
	        	'activo' => true,
	        	'tipo_id' => 2,
	        	'datos_id' => 6
        	),
        	array(
	        	'nombre' => 'amatus',
	        	'password' => bcrypt('arma2018'),
	        	'activo' => true,
	        	'tipo_id' => 2,
	        	'datos_id' => 8
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
	        	'referencia_id' => null,
	        	'parentezco_id' => null,
	        	'direccion_id' => null
	        ),
	        array(
	        	'nombres' => 'Armando',
	        	'apellidos' => 'Sanchez Ortiz',
	        	'telefono' => 2221028301,
	        	'referencia_id' => 1,
	        	'parentezco_id' => 2,
	        	'direccion_id' => 1
	        ),
	        array(
	        	'nombres' => 'Gabriela',
	        	'apellidos' => 'Fong López',
	        	'telefono' => 2223790822,
	        	'referencia_id' => null,
	        	'parentezco_id' => null,
	        	'direccion_id' => null
	        ),
	        array(
	        	'nombres' => 'Magaly',
	        	'apellidos' => 'Fong Juárez',
	        	'telefono' => 2224039421,
	        	'referencia_id' => 3,
	        	'parentezco_id' => 1,
	        	'direccion_id' => 2
	        ),
	        array(
	        	'nombres' => 'Joanna',
	        	'apellidos' => 'Sosa Rodriguez',
	        	'telefono' => 2222452920,
	        	'referencia_id' => null,
	        	'parentezco_id' => null,
	        	'direccion_id' => null
	        ),
	        array(
	        	'nombres' => 'Juan Carlos',
	        	'apellidos' => 'Rodriguez Mercado',
	        	'telefono' => 2223094823,
	        	'referencia_id' => 5,
	        	'parentezco_id' => 3,
	        	'direccion_id' => 3
	        ),
	        array(
	        	'nombres' => 'Alfredo',
	        	'apellidos' => 'Matus Cortes',
	        	'telefono' => 2222595683,
	        	'referencia_id' => null,
	        	'parentezco_id' => null,
	        	'direccion_id' => null
	        ),
	        array(
	        	'nombres' => 'Aldo Rafael',
	        	'apellidos' => 'Matus Angulo',
	        	'telefono' => 2223958359,
	        	'referencia_id' => 7,
	        	'parentezco_id' => 3,
	        	'direccion_id' => 4
	        ),
        );

        foreach($direcciones as $dir){
        	DB::table('direcciones')->insert($dir);
        }
        foreach ($datos as $dato) {
        	DB::table('personas')->insert($dato);
        }
	    foreach($usuarios as $usr){
	        DB::table('usuarios')->insert($usr);
	    }
    }
}
