<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer')->delete();
        
        \DB::table('customer')->insert(array (
            0 => 
            array (
                'id' => 4,
                'customer_group_id' => 1,
                'user_id' => 13,
                'company_name' => 'customer1',
                'name' => 'customer1',
                'email' => 'customer1@mail.com',
                'phone' => '086231321232',
                'tax' => NULL,
                'address' => 'Jl purbaratu saroja uu',
                'city' => 'tasikmalaya',
                'state' => 'jawa barat',
                'country' => 'indonesia',
                'postal_code' => '46190',
                'is_active' => '0',
                'created_at' => '2024-10-24 04:04:41',
                'updated_at' => '2024-10-24 04:04:41',
            ),
            1 => 
            array (
                'id' => 6,
                'customer_group_id' => 1,
                'user_id' => 15,
                'company_name' => 'Vargas Tyson Co',
                'name' => 'Aileen Puckett',
                'email' => 'gymuhi@mailinator.com',
            'phone' => '+1 (235) 493-2221',
                'tax' => 'Dolores aliquam quis',
                'address' => 'Ea officiis tempore',
                'city' => 'Aut et iste numquam',
                'state' => 'Saepe fugit commodi',
                'country' => 'Omnis officia volupt',
                'postal_code' => 'Omnis quas nostrud i',
                'is_active' => '0',
                'created_at' => '2024-10-24 09:49:56',
                'updated_at' => '2024-10-24 09:49:56',
            ),
        ));
        
        
    }
}