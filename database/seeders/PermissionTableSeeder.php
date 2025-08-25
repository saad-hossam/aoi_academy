<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete all existing permissions
        // Permission::query()->delete();

        // List of permissions to seed
        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

            'about-list',
           'about-create',
           'about-edit',
           'about-delete',

          
           'partner-list',
           'partner-create',
           'partner-edit',
           'partner-delete',

       

           'certificate-list',
           'certificate-create',
           'certificate-edit',
           'certificate-delete',

           'lecturer-list',
           'lecturer-create',
           'lecturer-edit',
           'lecturer-delete',
      
           'video-list',
           'video-create',
           'video-edit',
           'video-delete',
           
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
