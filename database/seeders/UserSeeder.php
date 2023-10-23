<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Super-Admin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Publisher']);
        $role4 = Role::create(['name' => 'User']);

        $user1 = User::create([
            'name' => 'The Super-Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => '1',

        ]);
        $user1->assignRole($role1);

        $user2 = User::create([
            'name' => 'The Programmer',
            'username' => 'noob',
            'email' => 'programmer@gmail.com',
            'email_verified_at' => now(),
            'password' => '2',

        ]);
        $user2->assignRole($role2);

        $user3 = User::create([
            'name' => 'The Publisher',
            'username' => 'publisher',
            'email' => 'publisher@gmail.com',
            'email_verified_at' => now(),
            'password' => '3',

        ]);
        $user3->assignRole($role3);

        $user4 = User::create([
            'name' => 'The User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => '4',

        ]);
        $user4->assignRole($role4);
    }
}