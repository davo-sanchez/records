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
        //Permission list
        Permission::create(['name' => 'expedientes.index']);
        Permission::create(['name' => 'expedientes.edit']);
        Permission::create(['name' => 'expedientes.show']);
        Permission::create(['name' => 'expedientes.create']);
        Permission::create(['name' => 'expedientes.destroy']);

        //Admin
        $admin = Role::create(['name' => 'Administrador']);

        $admin->givePermissionTo([
            'expedientes.index',
            'expedientes.edit',
            'expedientes.show',
            'expedientes.create',
            'expedientes.destroy'
        ]);
        //$admin->givePermissionTo('products.index');
        //$admin->givePermissionTo(Permission::all());
       
        //Guest
        $guest = Role::create(['name' => 'Consultor']);

        $guest->givePermissionTo([
            'expedientes.index',
            'expedientes.show'
        ]);

        //User Admin
        $user = User::find(1); //Italo Morales
        $user->assignRole('Administrador');

        $user = User::find(2); //Italo Morales
        $user->assignRole('Consultor');
    }
}
