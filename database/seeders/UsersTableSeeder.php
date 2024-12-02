<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'outlet_id' => NULL,
                'name' => 'Super Admin',
                'email' => 'superadmin@mail.com',
                'phone' => NULL,
                'post_code' => NULL,
                'city' => NULL,
                'country' => NULL,
                'email_verified_at' => '2024-10-15 05:56:49',
                'password' => '$2y$10$Hk9G9KqIL9y/Ax8keWY1SuszNBALiJRqzzp6Sf4XcPMeG8oE2/Xwa',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            1 => 
            array (
                'id' => 2,
                'outlet_id' => NULL,
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'phone' => NULL,
                'post_code' => NULL,
                'city' => NULL,
                'country' => NULL,
                'email_verified_at' => '2024-10-15 05:56:49',
                'password' => '$2y$10$wsXLm4bgEDH9EsKU0a8yZewWYtBXPb3Hq3yi8ZXYg2Ko8S4hUQu4O',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            2 => 
            array (
                'id' => 3,
                'outlet_id' => NULL,
                'name' => 'User',
                'email' => 'user@mail.com',
                'phone' => NULL,
                'post_code' => NULL,
                'city' => NULL,
                'country' => NULL,
                'email_verified_at' => '2024-10-15 05:56:49',
                'password' => '$2y$10$IXdJakeHZBoitQGKf0B8EuBh6F66rl41wkh7/NPaNY1t.DUMu/yNy',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            3 => 
            array (
                'id' => 13,
                'outlet_id' => 1,
                'name' => 'customer1',
                'email' => 'customer1@mail.com',
                'phone' => NULL,
                'post_code' => NULL,
                'city' => NULL,
                'country' => NULL,
                'email_verified_at' => '2024-10-24 04:04:41',
                'password' => '$2y$10$75ScGNhIFSbNi9dXwdXXeuuER/1Qzw9116PraJl00POwEDi20YVAG',
                'remember_token' => NULL,
                'created_at' => '2024-10-24 04:04:41',
                'updated_at' => '2024-10-24 04:04:41',
            ),
            4 => 
            array (
                'id' => 14,
                'outlet_id' => NULL,
                'name' => 'customer2',
                'email' => 'customer2@mail.com',
                'phone' => NULL,
                'post_code' => NULL,
                'city' => NULL,
                'country' => NULL,
                'email_verified_at' => '2024-10-24 09:42:02',
                'password' => '$2y$10$jJRH4kuZSQpQWVjuRwv4WeltzE7Lp0EMDV5h9jg2eFDh3yhkvcuZe',
                'remember_token' => NULL,
                'created_at' => '2024-10-24 09:42:02',
                'updated_at' => '2024-10-24 09:42:02',
            ),
            5 => 
            array (
                'id' => 15,
                'outlet_id' => 1,
                'name' => 'Aileen Puckett',
                'email' => 'gymuhi@mailinator.com',
                'phone' => NULL,
                'post_code' => NULL,
                'city' => NULL,
                'country' => NULL,
                'email_verified_at' => '2024-10-24 09:49:56',
                'password' => '$2y$10$9rQVQst6YObuBh2IFgV3fufIz27T6FJxHBDnSeDUbHVDFs6haYDIK',
                'remember_token' => NULL,
                'created_at' => '2024-10-24 09:49:56',
                'updated_at' => '2024-10-24 09:49:56',
            ),
        ));
        
        
    }
}