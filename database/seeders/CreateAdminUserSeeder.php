<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
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
        $superadminUser = User::firstOrCreate(
            ['email' => 'gmzesan7767@gmail.com'],
            [
                'name' => 'G.M. Zesan',
                'password' => bcrypt('12345678aA'),
                'phone_no' => '+8801921324091',
                'image' => 'upload/user-image/20240129060727.jpeg',
                'description' => '<p>Executive Administrator</p>',
            ]
        );

        $admin = User::firstOrCreate(
            ['email' => 'alfahiminternational944@gmail.com'],
            [
                'name' => 'Hasibur Rahman Fahim',
                'phone_no'=> '+8801624238179',
                'password' => bcrypt('admin@12345'),
            ]
        );

        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        $superadminUser->assignRole('superadmin');
        $admin->assignRole('admin');

        // Superadmin has access to every permission
        $allPermissions = Permission::pluck('name')->all();
        $superAdminRole->syncPermissions($allPermissions);

        // Admin has access to operational modules (excluding system role assignment and common type configs)
        $adminPermissions = Permission::whereNotIn('name', [
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'assignrole-list', 'assignrole-create',
            'commontype-list', 'commontype-create', 'commontype-edit', 'commontype-delete'
        ])->pluck('name')->all();
        $adminRole->syncPermissions($adminPermissions);
    }
}
