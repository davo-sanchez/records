<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Expedientes list
        Permission::create(['name' => 'expedientes.select','display_name' => 'Consultar Expedientes']);
        Permission::create(['name' => 'expedientes.edit', 'display_name' => 'Editar Expedientes']);
        Permission::create(['name' => 'expedientes.create', 'display_name' => 'Crear Expedientes']);
        Permission::create(['name' => 'expedientes.destroy', 'display_name' => 'Eliminar Expedientes']);
        Permission::create(['name' => 'expedientes.trashbin', 'display_name' => 'Papelera de Expedientes']);
        Permission::create(['name' => 'expedientes.destroy_forever', 'display_name' => 'Elimilar Expedientes Permanentemente']);
        Permission::create(['name' => 'expedientes.restore', 'display_name' => 'Restaurar Expedientes']);

        //Usuarios
        Permission::create(['name' => 'user.select','display_name' => 'Consultar Usuarios']);
        Permission::create(['name' => 'user.edit', 'display_name' => 'Editar Usuarios']);
        Permission::create(['name' => 'user.create', 'display_name' => 'Crear Usuarios']);
        Permission::create(['name' => 'user.destroy', 'display_name' => 'Eliminar Usuarios']);

        //Roles
        Permission::create(['name' => 'role.select','display_name' => 'Consultar Roles']);
        Permission::create(['name' => 'role.edit', 'display_name' => 'Editar Roles']);
        Permission::create(['name' => 'role.create', 'display_name' => 'Crear Roles']);
        Permission::create(['name' => 'role.destroy', 'display_name' => 'Eliminar Roles']);

        //Admin
        $admin = Role::create(['name' => 'Administrador','editable' => 0]);

        $admin->givePermissionTo([
            'expedientes.select',
            'expedientes.edit',
            'expedientes.create',
            'expedientes.destroy',
            'expedientes.trashbin',
            'expedientes.destroy_forever',
            'expedientes.restore',
            'user.select',
            'user.edit',
            'user.create',
            'user.destroy',
            'role.select',
            'role.edit',
            'role.create',
            'role.destroy'
        ]);
       
        //Rol consultor
        $consultor = Role::create(['name' => 'Consultor']);

        $consultor->givePermissionTo([
            'expedientes.select',
        ]);

        //Capturista
        $capturista = Role::create(['name' => 'Capturista']);

        $capturista->givePermissionTo([
            'expedientes.select',
            'expedientes.edit',
            'expedientes.create',
            'expedientes.trashbin'
        ]);

        //User Admin
        $user = User::find(1); 
        $user->assignRole('Administrador');
    }
}
