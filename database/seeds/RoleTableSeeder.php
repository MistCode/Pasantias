<?php	
use Illuminate\Database\Seeder;	
use App\Role;	
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
        $role->slug = "Admin";	
        $role->description = "Administrador";
        $role->special = "all-access";
        $role->save();	
        $role = new Role();	
        $role->name = "user";
        $role->slug = "User";	
        $role->description = "User"
        $role->special = "all-access";
        $role->save();	
    }	
}