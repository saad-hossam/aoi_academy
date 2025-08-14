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

           'department-list',
           'department-create',
           'department-edit',
           'department-delete',

           'project-list',
           'project-create',
           'project-edit',
           'project-delete',

           'service-list',
           'service-create',
           'service-edit',
           'service-delete',

           'slide-list',
           'slide-create',
           'slide-edit',
           'slide-delete',

           'history-list',
           'history-create',
           'history-edit',
           'history-delete',

           'partner-list',
           'partner-create',
           'partner-edit',
           'partner-delete',

           'message-list',
           'message-create',
           'message-edit',
           'message-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
