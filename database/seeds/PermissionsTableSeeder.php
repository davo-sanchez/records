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
        Permission::create(['name' => 'expedientes.select','display_name' => 'Consultar']);
        Permission::create(['name' => 'expedientes.edit', 'display_name' => 'Editar']);
        Permission::create(['name' => 'expedientes.create', 'display_name' => 'Crear']);
        Permission::create(['name' => 'expedientes.destroy', 'display_name' => 'Eliminar']);

        //Usuarios
        Permission::create(['name' => 'user.select','display_name' => 'Consultar']);
        Permission::create(['name' => 'user.edit', 'display_name' => 'Editar']);
        Permission::create(['name' => 'user.create', 'display_name' => 'Crear']);
        Permission::create(['name' => 'user.destroy', 'display_name' => 'Eliminar']);

        //Roles
        Permission::create(['name' => 'role.select','display_name' => 'Consultar']);
        Permission::create(['name' => 'role.edit', 'display_name' => 'Editar']);
        Permission::create(['name' => 'role.create', 'display_name' => 'Crear']);
        Permission::create(['name' => 'role.destroy', 'display_name' => 'Eliminar']);

        //Admin
        $admin = Role::create(['name' => 'Administrador','editable' => 0]);

        $admin->givePermissionTo([
            'expedientes.select',
            'expedientes.edit',
            'expedientes.create',
            'expedientes.destroy',
            'user.select',
            'user.edit',
            'user.create',
            'user.destroy',
            'role.select',
            'role.edit',
            'role.create',
            'role.destroy'
        ]);
       
        //Guest
        $guest = Role::create(['name' => 'Consultor']);

        $guest->givePermissionTo([
            'expedientes.select',
        ]);

        //User Admin
        $user = User::find(1); 
        $user->assignRole('Administrador');
    }
}
