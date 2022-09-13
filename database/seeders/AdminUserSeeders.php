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
        $user = User::create([
            'name' => 'admin',
            'email' => 'AustinKcgmail.com',
            'password' => bcrypt('08037019120')
        ]);

        $user = User::create([
            'name' => 'sales',
            'email' => 'sales@gmail.com',
            'password' => bcrypt('1234567890')
        ]);

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

         // Create Permissions
        Permission::create(['name' => User::Permission_Create]);
        Permission::create(['name' => User::Permission_Update]);
        Permission::create(['name' => User::Permission_Edit]);
        Permission::create(['name' => User::Permission_Delete]);
        Permission::create(['name' => User::Permission_View]);

        // Create roles and assign created permissions
        $admin_user = Role::create(['name' => User::Role_Admin]);
        $sales_role =  Role::create(['name' => User::Role_Sale]);

        $sales_role->givePermissionTo(User::Permission_View);


        // Assign roles to demo users
        $executive_admin = User::where('id',1)->first();

        $executive_admin->assignRole(User::Role_Admin);

        $sales_admin = User::where('id',2)->first();

        $sales_admin->assignRole(User::Role_Sale);





    }
}
