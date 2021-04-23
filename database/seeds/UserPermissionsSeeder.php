<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Listar Usuarios']);
        Permission::create(['name' => 'Editar Usuarios']);
        Permission::create(['name' => 'Ver Usuarios']);
        Permission::create(['name' => 'Crear Usuarios']);
        Permission::create(['name' => 'Eliminar Usuarios']);
    }
}
