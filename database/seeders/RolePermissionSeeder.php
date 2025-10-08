<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            ['name' => 'Create Courses', 'description' => 'Can create new Courses'],
            ['name' => 'Read Courses',  'description' => 'Can view Courses'],
            ['name' => 'Update Courses', 'description' => 'Can edit Courses'],
            ['name' => 'Delete Courses', 'description' => 'Can delete Courses'],
            ['name' => 'Manage Users', 'description' => 'Can manage user accounts'],
            ['name' => 'Manage Roles', 'description' => 'Can manage roles and permissions'],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                $permission
            );
        }

        // Create roles
        $roles = [
            [
                'name' => 'Admin',
                'description' => 'Full system access',
                'permissions' => Permission::all()->pluck('id')->toArray(),
            ],
            [
                'name' => 'Teacher',
                'description' => 'Course management access',
                'permissions' => Permission::whereIn('name', [
                    'Create Courses',
                    'Read Courses',
                    'Update Courses',
                    'DeleteCourses',
                ])->pluck('id')->toArray(),
            ],
            [
                'name' => 'Student',
                'description' => 'Course viewing access',
                'permissions' => Permission::whereIn('name', [
                    'Read Courses',
                ])->pluck('id')->toArray(),
            ],
        ];

        foreach ($roles as $roleData) {
            $permissions = $roleData['permissions'];
            unset($roleData['permissions']);

            $role = Role::firstOrCreate(
                $roleData
            );

            $role->permissions()->sync($permissions);
        }
    }
}
