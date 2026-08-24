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
        $superadminUser = User::create([
            'name' => 'G.M. Zesan',
            'email' => 'gmzesan7767@gmail.com',
            'password' => bcrypt('12345678aA'),
            'phone_no' => '+8801921324091',
            'image' => 'upload/user-image/20240129060727.jpeg',
            'description' => '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</p>',
        ]);
        $admin = User::create([
            'name' => 'Hasibur Rahman Fahim',
            'email' => 'alfahiminternational944@gmail.com',
            'phone_no'=> '+8801624238179',
            'password' => bcrypt('admin@12345'),
        ]);


        $permissions = Permission::pluck('id','name')->all();
        $permissionsAdmin = Permission::whereNotIn('name', ['role-list', 'role-create', 'role-edit', 'role-delete','commontype-list', 'commontype-create', 'commontype-edit', 'commontype-delete'])->pluck('id','name')->all();

        $superadminUser->assignRole('superadmin');
        $admin->assignRole('admin');


        // superadmin
        $superAdminRole = Role::findByName('superadmin');
        $superAdminRole->givePermissionTo($permissions);
        // admin
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo($permissionsAdmin);

    }
}
