<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRole = Role::firstOrCreate(['name' => 'vendor']);

        User::factory(50)->create()->each(function ($user) use ($vendorRole) {
            $user->assignRole($vendorRole);
        });

        Product::factory(100)->create();
    }
}
