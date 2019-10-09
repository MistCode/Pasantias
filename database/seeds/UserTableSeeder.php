<?php	
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;	
class UserTableSeeder extends Seeder	
{	
    /**	
     * Run the database seeds.	
     *	
     * @return void	
     */	
    public function run()	
    {	
        factory(App\User::class,3)->create();

        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrador',
            'special' => 'all-access',
        ]);	
    }	
}