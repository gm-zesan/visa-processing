<?php



namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;



class PermissionTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $permissions = [
            // role
            ['name' => 'role-list', 'display_name' => 'Role list', 'module' => 'role'],
            ['name' => 'role-create', 'display_name' => 'Role create', 'module' => 'role'],
            ['name' => 'role-edit', 'display_name' => 'Role edit', 'module' => 'role'],
            ['name' => 'role-delete', 'display_name' => 'Role delete', 'module' => 'role'],

            // user
            ['name' => 'user-list', 'display_name' => 'User list', 'module' => 'user'],
            ['name' => 'user-create', 'display_name' => 'User create', 'module' => 'user'],
            ['name' => 'user-edit', 'display_name' => 'User edit', 'module' => 'user'],
            ['name' => 'user-delete', 'display_name' => 'User delete', 'module' => 'user'],


            // commontype
            ['name' => 'commontype-list', 'display_name' => 'Common Type list', 'module' => 'commontype'],
            ['name' => 'commontype-create', 'display_name' => 'Common Type create', 'module' => 'commontype'],
            ['name' => 'commontype-edit', 'display_name' => 'Common Type edit', 'module' => 'commontype'],
            ['name' => 'commontype-delete', 'display_name' => 'Common Type delete', 'module' => 'commontype'],


            // website-content
            ['name' => 'website-content-list', 'display_name' => 'Website Content list', 'module' => 'website-content'],
            ['name' => 'website-content-create', 'display_name' => 'Website Content create', 'module' => 'website-content'],
            ['name' => 'website-content-edit', 'display_name' => 'Website Content edit', 'module' => 'website-content'],
            ['name' => 'website-content-delete', 'display_name' => 'Website Content delete', 'module' => 'website-content'],

            
            // contact
            ['name' => 'contact-list', 'display_name' => 'Contact list', 'module' => 'contact'],
            ['name' => 'contact-delete', 'display_name' => 'Contact delete', 'module' => 'contact'],


            // blog
            ['name' => 'blog-list', 'display_name' => 'Blog list', 'module' => 'blog'],
            ['name' => 'blog-create', 'display_name' => 'Blog create', 'module' => 'blog'],
            ['name' => 'blog-edit', 'display_name' => 'Blog edit', 'module' => 'blog'],
            ['name' => 'blog-delete', 'display_name' => 'Blog delete', 'module' => 'blog'],

            // category
            ['name' => 'category-list', 'display_name' => 'Category list', 'module' => 'category'],
            ['name' => 'category-create', 'display_name' => 'Category create', 'module' => 'category'],
            ['name' => 'category-edit', 'display_name' => 'Category edit', 'module' => 'category'],
            ['name' => 'category-delete', 'display_name' => 'Category delete', 'module' => 'category'],

            // product
            ['name' => 'product-list', 'display_name' => 'Product list', 'module' => 'product'],
            ['name' => 'product-create', 'display_name' => 'Product create', 'module' => 'product'],
            ['name' => 'product-edit', 'display_name' => 'Product edit', 'module' => 'product'],
            ['name' => 'product-delete', 'display_name' => 'Product delete', 'module' => 'product'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }

}
