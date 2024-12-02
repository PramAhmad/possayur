<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerGroupTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer_group')->delete();
        
        \DB::table('customer_group')->insert(array (
            0 => 
            array (
                'id' => 1,
                'outlet_id' => NULL,
                'name' => 'PT',
                'percentage' => 0,
                'is_active' => '0',
                'created_at' => '2024-10-24 03:35:26',
                'updated_at' => '2024-10-24 03:35:26',
            ),
        ));
        
        
    }
}