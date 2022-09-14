<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'admin',
            'email' => 'AustinKc@gmail.com',
            'password' => bcrypt('08037019120')
        ]);

        $user2 = User::create([
            'name' => 'sales',
            'email' => 'sales@gmail.com',
            'password' => bcrypt('1234567890')
        ]);

        // Create roles and assign created permissions
        $role1 = Role::create(['name' => 'Admin Manager']);
        $role2 = Role::create(['name' => 'Sales Manager']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role1->syncPermissions($permissions);
        // $role2->givePermissionTo('role-list', 'role-edit');

     
        $user1->assignRole([$role1->id]);
        $user2->assignRole([$role2->id]);


    }
}
