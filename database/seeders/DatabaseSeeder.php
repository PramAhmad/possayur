<?php

namespace Database\Seeders;

use App\Models\MediaManager;
use Database\Seeders\Api\ApiDatabaseSeeder;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
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

      
        $this->call(OutletsTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CustomerGroupTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
    }
}