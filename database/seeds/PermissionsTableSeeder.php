<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Usuarios
        Permission::create([
        	'name' => 'Navegar Usuarios',
        	'slug' => 'users.index',
        	'description' => 'Lista y Navega todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name' => 'Ver detalle de Usuarios',
        	'slug' => 'users.show',
        	'description' => 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
        	'name' => 'Edición de Usuarios',
        	'slug' => 'users.edit',
        	'description' => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar Usuarios',
        	'slug' => 'users.destroy',
        	'description' => 'Eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
        	'name' => 'Navegar Roles',
        	'slug' => 'roles.index',
        	'description' => 'Lista y Navega todos los roles del sistema',
        ]);
        Permission::create([
        	'name' => 'Ver detalle de Rol',
        	'slug' => 'roles.show',
        	'description' => 'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
        	'name' => 'Creación de Roles',
        	'slug' => 'roles.create',
        	'description' => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
        	'name' => 'Edición de Rol',
        	'slug' => 'roles.edit',
        	'description' => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar Rol',
        	'slug' => 'roles.destroy',
        	'description' => 'Eliminar cualquier rol del sistema',
        ]);

        //Grupos
        Permission::create([
        	'name' => 'Navegar Grupos',
        	'slug' => 'grupos.index',
        	'description' => 'Lista y Navega todos los grupos del sistema',
        ]);
        Permission::create([
        	'name' => 'Ver detalle de Grupo',
        	'slug' => 'grupos.show',
        	'description' => 'Ver en detalle cada grupo del sistema',
        ]);
        Permission::create([
        	'name' => 'Creación de Grupos',
        	'slug' => 'grupos.create',
        	'description' => 'Editar cualquier dato de un grupo del sistema',
        ]);
        Permission::create([
        	'name' => 'Edición de Grupo',
        	'slug' => 'grupos.edit',
        	'description' => 'Editar cualquier dato de un grupo del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar Grupo',
        	'slug' => 'grupos.destroy',
        	'description' => 'Eliminar cualquier grupo del sistema',
        ]);

        //Comunidades
        Permission::create([
        	'name' => 'Navegar Comunidades',
        	'slug' => 'comunidades.index',
        	'description' => 'Lista y Navega todos los comunidades del sistema',
        ]);
        Permission::create([
        	'name' => 'Ver detalle de Comunidad',
        	'slug' => 'comunidades.show',
        	'description' => 'Ver en detalle cada Comunidad del sistema',
        ]);
        Permission::create([
        	'name' => 'Creación de Comunidades',
        	'slug' => 'comunidades.create',
        	'description' => 'Editar cualquier dato de un Comunidad del sistema',
        ]);
        Permission::create([
        	'name' => 'Edición de Comunidad',
        	'slug' => 'comunidades.edit',
        	'description' => 'Editar cualquier dato de un Comunidad del sistema',
        ]);
        Permission::create([
        	'name' => 'Eliminar Comunidad',
        	'slug' => 'comunidades.destroy',
        	'description' => 'Eliminar cualquier Comunidad del sistema',
        ]);
    }
}
