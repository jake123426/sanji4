<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin = Role::create(['name'=>'admin']);
        $Basico = Role::create(['name'=>'basico']);
        $Premium = Role::create(['name'=>'premium']);

        Permission::create(['name'=>'perfil.edit'])->syncRoles([$Admin,$Basico,$Premium]);
        Permission::create(['name'=>'user.suscripcion'])->syncRoles([$Basico]);
        Permission::create(['name'=>'user.comentarios'])->syncRoles([$Admin,$Premium]);
        Permission::create(['name'=>'megustas.megusta'])->syncRoles([$Admin,$Premium]);
        Permission::create(['name'=>'user.chatx'])->syncRoles([$Admin,$Premium]);
        Permission::create(['name'=>'anuncios.favoritos'])->syncRoles([$Admin,$Premium]);

        Permission::create(['name'=>'mis_suscripcion'])->syncRoles([$Premium]);

        Permission::create(['name'=>'anuncios.edit'])->syncRoles([$Admin,$Premium]);
        Permission::create(['name'=>'misanuncio.misanuncios'])->syncRoles([$Admin,$Basico,$Premium]);
        Permission::create(['name'=>'anuncios.create'])->syncRoles([$Admin,$Basico,$Premium]);

        Permission::create(['name'=>'userss.index'])->syncRoles([$Admin]);
        Permission::create(['name'=>'Bitacora'])->syncRoles([$Admin]);
        Permission::create(['name'=>'lista_suscripcion'])->syncRoles([$Admin]);


    }
}
