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
            1 => 
            array (
                'id' => 2,
                'outlet_id' => NULL,
                'name' => 'dry good',
                'image' => '1740366556_LOGO KOYASAI_PUTIH.png',
                'slug' => 'dry-good',
                'description' => 'dry good',
                'created_at' => '2025-02-24 03:09:16',
                'updated_at' => '2025-02-24 03:09:16',
            ),
            2 => 
            array (
                'id' => 3,
                'outlet_id' => NULL,
                'name' => 'buah',
                'image' => '1740366589_LOGO KOYASAI_PUTIH.png',
                'slug' => 'buah',
                'description' => 'buah ini',
                'created_at' => '2025-02-24 03:09:49',
                'updated_at' => '2025-02-24 03:09:49',
            ),
        ));
        
        
    }
}