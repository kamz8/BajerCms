<?php

use Illuminate\Database\Seeder;
use App\Roles;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $role = Roles::where('name','Admin')->first();
        $user->name = "Super Admin"
        $user->email = "admin@admin.com";
        $user->password = bcrypt('admin123');
        $user->save();
        $user->roles()->attach($role);
    }
}
