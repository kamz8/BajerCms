<?php

use Illuminate\Database\Seeder;
use App\Role;
class RolesTableSeeder extends Seeder
{
    protected $roles = [
        'super_admin', 'admin', 'moderator', 'consultant', 'customer'
        ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        foreach ($this->roles as $roleName){
            $role->create(['name'=>$roleName]);
        }
    }
}
