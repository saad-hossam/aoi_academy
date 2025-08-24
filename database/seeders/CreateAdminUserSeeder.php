<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if the user already exists
        $user = User::firstOrCreate(
            ['email' => 'salimeslam55@gmail.com'], // Check condition
            [   // Attributes to set if user doesn't exist
                'name' => 'salimeslam',
                'password' => Hash::make('123456'), // Secure password hashing
                'roles_name' => ['super-admin'],
                'Status' => 'مفعل',
            ]
        );
         // Check if the user already exists
        $user = User::firstOrCreate(
            ['email' => 'saadhossam839@gmail.com'], // Check condition
            [   // Attributes to set if user doesn't exist
                'name' => 'saadhossam',
                'password' => Hash::make('123456'), // Secure password hashing
                'roles_name' => ['super-admin'],
                'Status' => 'مفعل',
            ]
        );

        // Check if the role already exists
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Get all permissions
        $permissions = Permission::pluck('id', 'id')->all();

        // Assign all permissions to the role
        $role->syncPermissions($permissions);

        // Assign the role to the user
        $user->assignRole($role);
    }
}
