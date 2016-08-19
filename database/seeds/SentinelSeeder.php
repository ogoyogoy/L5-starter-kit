<?php

use Illuminate\Database\Seeder;

class SentinelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin & User role
        Sentinel::getRoleRepository()->createModel()->create(
        [
            'name' => 'Administrator',
            'slug' => 'admin',
            'permissions' => [
                'admin' => true,
                'user'  => true,
            ]
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'User',
            'slug' => 'user',
            'permissions'=>[
                'user'  => true,
            ]
        ]);

        // Create user administrator
        $credentials = [
            'email'       => 'admin@app.com',
            'password'    => '123456',
            'first_name'  => 'Admin',
            'last_name'   => 'App',
            // 'permissions' => $role->permissions
        ];

        $user = Sentinel::registerAndActivate($credentials);

        // Set user Administrator role to Admin
        $role = Sentinel::findRoleBySlug('admin');
        $user->roles()->attach($role);
    }
}
