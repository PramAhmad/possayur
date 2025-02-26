<?php

namespace Database\Seeders;

use App\Models\MediaManager;
use Database\Seeders\Api\ApiDatabaseSeeder;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeders extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $this->call([
            PermissionsTableSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategoryTableSeeder::class,
            UnitTableSeeder::class,
            UnitsTableSeeder::class,
            ProductTableSeeder::class
        ]);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
    }
}
