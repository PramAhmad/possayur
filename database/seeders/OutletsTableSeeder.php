<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OutletsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('outlets')->delete();
        
        \DB::table('outlets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'uuid' => 'cf7a6079-e720-4892-adf3-5a845d55529c',
                'created_at' => '2024-10-15 07:30:29',
                'updated_at' => '2024-10-15 07:30:29',
                'name' => 'Outlet 1',
                'logo' => '1728977429.jpeg',
                'address' => 'JL purbaratu Kp cihaji saroja uu',
            'phone' => '+1 (629) 199-1839',
                'email' => NULL,
                'description' => NULL,
            ),
        ));
        
        
    }
}