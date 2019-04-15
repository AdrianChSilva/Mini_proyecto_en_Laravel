<?php

use Illuminate\Database\Seeder;
use PruebApp\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "admin";
        $role->description = "Es un administrador y puede hacer tareas CRUD";
        $role->save();

        $role = new Role();
        $role->name = "user";
        $role->description = "Usuario normal sin posibilidad de realizar tareas CRUD";
        $role->save();
    }
}
