<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allPermissions = [
            'access_products',
            'create_product',
            'edit_product',
            'view_product',
            'access_orders',
            'view_order'
        ];

         foreach ($allPermissions as $permission) {
            Permission::create(
                ['name' => $permission],
            );
        }

        $vendoRole = Role::create(['name' => 'vendor']);

        $vendoRole->syncPermissions($allPermissions);

        Role::create(['name' => 'customer']);
    }
}
