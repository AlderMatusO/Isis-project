<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CatalogueTablesSeeder::class);
         $this->call(UsuariosTablesSeeder::class);
         $this->call(MenuTablesSeeder::class);
    }
}
