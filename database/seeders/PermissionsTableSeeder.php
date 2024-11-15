<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'user create',
                'module_name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user update',
                'module_name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'user delete',
                'module_name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'user show',
                'module_name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'user index',
                'module_name' => 'user',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'permission index',
                'module_name' => 'permission',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'permission create',
                'module_name' => 'permission',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'permission update',
                'module_name' => 'permission',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'permission delete',
                'module_name' => 'permission',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'permission show',
                'module_name' => 'permission',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'role index',
                'module_name' => 'role',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'role create',
                'module_name' => 'role',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'role update',
                'module_name' => 'role',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'role delete',
                'module_name' => 'role',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'role show',
                'module_name' => 'role',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'database_backup viewAny',
                'module_name' => 'database_backup',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'database_backup create',
                'module_name' => 'database_backup',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'database_backup delete',
                'module_name' => 'database_backup',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'database_backup download',
                'module_name' => 'database_backup',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'menu users_list',
                'module_name' => 'menu',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'menu role_permission',
                'module_name' => 'menu',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'menu role_permission_permissions',
                'module_name' => 'menu',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'menu role_permission_roles',
                'module_name' => 'menu',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'menu database_backup',
                'module_name' => 'menu',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:56:49',
                'updated_at' => '2024-10-15 05:56:49',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'outlet create',
                'module_name' => 'outlet',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 07:16:15',
                'updated_at' => '2024-10-15 07:16:15',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'outlet update',
                'module_name' => 'outlet',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 19:26:55',
                'updated_at' => '2024-10-15 19:26:55',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'outlet delete',
                'module_name' => 'outlet',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 19:27:10',
                'updated_at' => '2024-10-15 19:27:10',
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'product create',
                'module_name' => 'product',
                'guard_name' => 'web',
                'created_at' => '2024-10-23 07:37:26',
                'updated_at' => '2024-10-23 07:37:26',
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'product index',
                'module_name' => 'product',
                'guard_name' => 'web',
                'created_at' => '2024-10-23 07:37:38',
                'updated_at' => '2024-10-23 07:37:38',
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'product update',
                'module_name' => 'product',
                'guard_name' => 'web',
                'created_at' => '2024-10-24 03:12:49',
                'updated_at' => '2024-10-24 03:12:49',
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'product delete',
                'module_name' => 'product',
                'guard_name' => 'web',
                'created_at' => '2024-10-24 03:12:58',
                'updated_at' => '2024-10-24 03:12:58',
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'product isdif',
                'module_name' => 'product',
                'guard_name' => 'web',
                'created_at' => '2024-10-24 03:13:07',
                'updated_at' => '2024-10-24 03:13:07',
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'product_customer_price index',
                'module_name' => 'product_customer_price',
                'guard_name' => 'web',
                'created_at' => '2024-10-24 09:03:46',
                'updated_at' => '2024-10-24 09:03:46',
            ),
            33 => 
            array (
                'id' => 35,
                'name' => 'product_customer_price create',
                'module_name' => 'product_customer_price',
                'guard_name' => 'web',
                'created_at' => '2024-10-24 09:04:02',
                'updated_at' => '2024-10-24 09:04:02',
            ),
            34 => 
            array (
                'id' => 36,
                'name' => 'product_customer_price update',
                'module_name' => 'product_customer_price',
                'guard_name' => 'web',
                'created_at' => '2024-10-24 09:04:15',
                'updated_at' => '2024-10-24 09:04:15',
            ),
            35 => 
            array (
                'id' => 37,
                'name' => 'product_customer_price delete',
                'module_name' => 'product_customer_price',
                'guard_name' => 'web',
                'created_at' => '2024-10-24 09:04:26',
                'updated_at' => '2024-10-24 09:04:26',
            ),
            36 => 
            array (
                'id' => 38,
                'name' => 'purchase index',
                'module_name' => 'purchase',
                'guard_name' => 'web',
                'created_at' => '2024-10-25 03:37:51',
                'updated_at' => '2024-10-25 03:37:51',
            ),
            37 => 
            array (
                'id' => 39,
                'name' => 'purchase create',
                'module_name' => 'purchase',
                'guard_name' => 'web',
                'created_at' => '2024-10-25 03:37:58',
                'updated_at' => '2024-10-25 03:37:58',
            ),
            38 => 
            array (
                'id' => 40,
                'name' => 'purchase edit',
                'module_name' => 'purchase',
                'guard_name' => 'web',
                'created_at' => '2024-10-25 03:38:04',
                'updated_at' => '2024-10-25 03:38:04',
            ),
            39 => 
            array (
                'id' => 41,
                'name' => 'purchase delete',
                'module_name' => 'purchase',
                'guard_name' => 'web',
                'created_at' => '2024-10-25 03:38:14',
                'updated_at' => '2024-10-25 03:38:14',
            ),
            40 => 
            array (
                'id' => 42,
                'name' => 'category update',
                'module_name' => 'category',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 06:54:59',
                'updated_at' => '2024-11-09 06:54:59',
            ),
            41 => 
            array (
                'id' => 43,
                'name' => 'category delete',
                'module_name' => 'category',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 06:55:09',
                'updated_at' => '2024-11-09 06:55:09',
            ),
            42 => 
            array (
                'id' => 44,
                'name' => 'coupon index',
                'module_name' => 'coupon',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 08:36:23',
                'updated_at' => '2024-11-09 08:36:23',
            ),
            43 => 
            array (
                'id' => 45,
                'name' => 'coupon create',
                'module_name' => 'coupon',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 08:36:31',
                'updated_at' => '2024-11-09 08:36:31',
            ),
            44 => 
            array (
                'id' => 46,
                'name' => 'coupon update',
                'module_name' => 'coupon',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 08:36:40',
                'updated_at' => '2024-11-09 08:36:40',
            ),
            45 => 
            array (
                'id' => 47,
                'name' => 'coupon delete',
                'module_name' => 'coupon',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 08:36:54',
                'updated_at' => '2024-11-09 08:36:54',
            ),
            46 => 
            array (
                'id' => 48,
                'name' => 'category create',
                'module_name' => 'category',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 09:22:09',
                'updated_at' => '2024-11-09 09:22:09',
            ),
            47 => 
            array (
                'id' => 49,
                'name' => 'suratjalan index',
                'module_name' => 'suratjalan',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 10:19:48',
                'updated_at' => '2024-11-09 10:19:48',
            ),
            48 => 
            array (
                'id' => 50,
                'name' => 'suratjalan create',
                'module_name' => 'suratjalan',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 10:19:57',
                'updated_at' => '2024-11-09 10:19:57',
            ),
            49 => 
            array (
                'id' => 51,
                'name' => 'suratjalan edit',
                'module_name' => 'suratjalan',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 10:20:10',
                'updated_at' => '2024-11-09 10:20:10',
            ),
            50 => 
            array (
                'id' => 52,
                'name' => 'suratjalan delete',
                'module_name' => 'suratjalan',
                'guard_name' => 'web',
                'created_at' => '2024-11-09 10:20:18',
                'updated_at' => '2024-11-09 10:20:18',
            ),
            51 => 
            array (
                'id' => 53,
                'name' => 'suratjalan view',
                'module_name' => 'suratjalan',
                'guard_name' => 'web',
                'created_at' => '2024-11-12 05:45:54',
                'updated_at' => '2024-11-12 05:45:54',
            ),
            52 => 
            array (
                'id' => 54,
                'name' => 'suratjalan show',
                'module_name' => 'suratjalan',
                'guard_name' => 'web',
                'created_at' => '2024-11-12 05:46:13',
                'updated_at' => '2024-11-12 05:46:13',
            ),
            53 => 
            array (
                'id' => 55,
                'name' => 'unit index',
                'module_name' => 'unit',
                'guard_name' => 'web',
                'created_at' => '2024-11-14 09:49:23',
                'updated_at' => '2024-11-14 09:49:23',
            ),
            54 => 
            array (
                'id' => 56,
                'name' => 'unit create',
                'module_name' => 'unit',
                'guard_name' => 'web',
                'created_at' => '2024-11-14 09:49:32',
                'updated_at' => '2024-11-14 09:49:32',
            ),
            55 => 
            array (
                'id' => 57,
                'name' => 'unit edit',
                'module_name' => 'unit',
                'guard_name' => 'web',
                'created_at' => '2024-11-14 09:49:39',
                'updated_at' => '2024-11-14 09:49:39',
            ),
            56 => 
            array (
                'id' => 58,
                'name' => 'unit delete',
                'module_name' => 'unit',
                'guard_name' => 'web',
                'created_at' => '2024-11-14 09:49:46',
                'updated_at' => '2024-11-14 09:49:46',
            ),
        ));
        
        
    }
}