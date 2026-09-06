<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            // 1. Role Management
            ['name' => 'role-list', 'display_name' => 'Role list', 'module' => 'role'],
            ['name' => 'role-create', 'display_name' => 'Role create', 'module' => 'role'],
            ['name' => 'role-edit', 'display_name' => 'Role edit', 'module' => 'role'],
            ['name' => 'role-delete', 'display_name' => 'Role delete', 'module' => 'role'],

            // 2. Assign Role
            ['name' => 'assignrole-list', 'display_name' => 'Assign role list', 'module' => 'assign-role'],
            ['name' => 'assignrole-create', 'display_name' => 'Assign role save', 'module' => 'assign-role'],

            // 3. User Management
            ['name' => 'user-list', 'display_name' => 'User list', 'module' => 'user'],
            ['name' => 'user-create', 'display_name' => 'User create', 'module' => 'user'],
            ['name' => 'user-edit', 'display_name' => 'User edit', 'module' => 'user'],
            ['name' => 'user-delete', 'display_name' => 'User delete', 'module' => 'user'],

            // 4. Candidate Applications
            ['name' => 'application-list', 'display_name' => 'Application list', 'module' => 'application'],
            ['name' => 'application-view', 'display_name' => 'Application view', 'module' => 'application'],
            ['name' => 'application-edit', 'display_name' => 'Application status update', 'module' => 'application'],
            ['name' => 'application-delete', 'display_name' => 'Application delete', 'module' => 'application'],

            // 5. Country Management
            ['name' => 'country-list', 'display_name' => 'Country list', 'module' => 'country'],
            ['name' => 'country-create', 'display_name' => 'Country create', 'module' => 'country'],
            ['name' => 'country-edit', 'display_name' => 'Country edit', 'module' => 'country'],
            ['name' => 'country-delete', 'display_name' => 'Country delete', 'module' => 'country'],

            // 6. Visa Type Management
            ['name' => 'visa_type-list', 'display_name' => 'Visa Type list', 'module' => 'visa_type'],
            ['name' => 'visa_type-create', 'display_name' => 'Visa Type create', 'module' => 'visa_type'],
            ['name' => 'visa_type-edit', 'display_name' => 'Visa Type edit', 'module' => 'visa_type'],
            ['name' => 'visa_type-delete', 'display_name' => 'Visa Type delete', 'module' => 'visa_type'],

            // 7. Our Team
            ['name' => 'our_team-list', 'display_name' => 'Our Team list', 'module' => 'our_team'],
            ['name' => 'our_team-create', 'display_name' => 'Our Team create', 'module' => 'our_team'],
            ['name' => 'our_team-edit', 'display_name' => 'Our Team edit', 'module' => 'our_team'],
            ['name' => 'our_team-delete', 'display_name' => 'Our Team delete', 'module' => 'our_team'],

            // 8. Blog Category
            ['name' => 'category-list', 'display_name' => 'Category list', 'module' => 'category'],
            ['name' => 'category-create', 'display_name' => 'Category create', 'module' => 'category'],
            ['name' => 'category-edit', 'display_name' => 'Category edit', 'module' => 'category'],
            ['name' => 'category-delete', 'display_name' => 'Category delete', 'module' => 'category'],

            // 9. Blog & News
            ['name' => 'blog-list', 'display_name' => 'Blog list', 'module' => 'blog'],
            ['name' => 'blog-create', 'display_name' => 'Blog create', 'module' => 'blog'],
            ['name' => 'blog-edit', 'display_name' => 'Blog edit', 'module' => 'blog'],
            ['name' => 'blog-delete', 'display_name' => 'Blog delete', 'module' => 'blog'],

            // 10. Website Content / CMS
            ['name' => 'website-content-list', 'display_name' => 'Website Content list', 'module' => 'website-content'],
            ['name' => 'website-content-create', 'display_name' => 'Website Content create', 'module' => 'website-content'],
            ['name' => 'website-content-edit', 'display_name' => 'Website Content edit', 'module' => 'website-content'],
            ['name' => 'website-content-delete', 'display_name' => 'Website Content delete', 'module' => 'website-content'],

            // 11. Common Type
            ['name' => 'commontype-list', 'display_name' => 'Common Type list', 'module' => 'commontype'],
            ['name' => 'commontype-create', 'display_name' => 'Common Type create', 'module' => 'commontype'],
            ['name' => 'commontype-edit', 'display_name' => 'Common Type edit', 'module' => 'commontype'],
            ['name' => 'commontype-delete', 'display_name' => 'Common Type delete', 'module' => 'commontype'],

            // 12. Theme Management
            ['name' => 'theme-list', 'display_name' => 'Theme list', 'module' => 'theme'],
            ['name' => 'theme-create', 'display_name' => 'Theme create', 'module' => 'theme'],
            ['name' => 'theme-edit', 'display_name' => 'Theme edit', 'module' => 'theme'],
            ['name' => 'theme-delete', 'display_name' => 'Theme delete', 'module' => 'theme'],
            ['name' => 'theme-active', 'display_name' => 'Theme activate', 'module' => 'theme'],

            // 13. Contact Messages
            ['name' => 'contact-list', 'display_name' => 'Contact list', 'module' => 'contact'],
            ['name' => 'contact-delete', 'display_name' => 'Contact delete', 'module' => 'contact'],
        ];

        // Delete obsolete permissions that no longer exist (e.g., product, appointments)
        $validNames = array_column($permissions, 'name');
        Permission::whereNotIn('name', $validNames)->delete();

        // Create or update all active module permissions
        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                [
                    'display_name' => $permission['display_name'],
                    'module' => $permission['module'],
                    'guard_name' => 'web',
                ]
            );
        }
    }
}
