<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('category')->delete();
        
        \DB::table('category')->insert(array (
            0 => 
            array (
                'id' => 1,
                'outlet_id' => NULL,
                'name' => 'sayur',
                'image' => '1729738370_app-store.png',
                'slug' => 'sayur',
                'description' => 'ini untuk sayur',
                'created_at' => '2024-10-24 02:52:50',
                'updated_at' => '2024-10-24 02:52:50',
            ),
        ));
        
        
    }
}