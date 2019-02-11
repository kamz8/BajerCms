<?php

use Illuminate\Database\Seeder;
use App\Role;
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
        $user = $user->create([
            'name' => 'Super Admin',
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);
        $role = Role::where('name','super_admin')->first();
        $user->roles()->sync($role);
        $roles = Role::all();
        $users = factory(\App\User::class, 20)
            ->create()
            ->each(function ($u) use ($roles) {

                $u->roles()->attach($roles->random());
            });

    }
}
