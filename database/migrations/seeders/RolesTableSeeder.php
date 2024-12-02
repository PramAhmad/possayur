<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'super-admin',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Customer',
                'guard_name' => 'web',
                'created_at' => '2024-10-24 04:03:40',
                'updated_at' => '2024-10-24 04:03:40',
            ),
        ));
        
        
    }
}