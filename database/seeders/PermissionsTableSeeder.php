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
                'name' => 'purchase view',
                'module_name' => 'purchase',
                'guard_name' => 'web',
                'created_at' => '2024-10-25 03:37:51',
                'updated_at' => '2024-11-30 19:05:33',
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
            57 => 
            array (
                'id' => 59,
                'name' => 'tax index',
                'module_name' => 'tax',
                'guard_name' => 'web',
                'created_at' => '2024-11-16 04:29:43',
                'updated_at' => '2024-11-16 04:29:43',
            ),
            58 => 
            array (
                'id' => 60,
                'name' => 'tax create',
                'module_name' => 'tax',
                'guard_name' => 'web',
                'created_at' => '2024-11-16 04:29:52',
                'updated_at' => '2024-11-16 04:29:52',
            ),
            59 => 
            array (
                'id' => 61,
                'name' => 'tax edit',
                'module_name' => 'tax',
                'guard_name' => 'web',
                'created_at' => '2024-11-16 04:29:58',
                'updated_at' => '2024-11-16 04:29:58',
            ),
            60 => 
            array (
                'id' => 62,
                'name' => 'tax delete',
                'module_name' => 'tax',
                'guard_name' => 'web',
                'created_at' => '2024-11-16 04:30:07',
                'updated_at' => '2024-11-16 04:30:07',
            ),
            61 => 
            array (
                'id' => 63,
                'name' => 'salesorder index',
                'module_name' => 'salesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-16 07:42:31',
                'updated_at' => '2024-11-16 07:42:31',
            ),
            62 => 
            array (
                'id' => 64,
                'name' => 'salesorder create',
                'module_name' => 'salesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-16 07:42:40',
                'updated_at' => '2024-11-16 07:42:40',
            ),
            63 => 
            array (
                'id' => 65,
                'name' => 'salesorder edit',
                'module_name' => 'salesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-16 07:42:47',
                'updated_at' => '2024-11-16 07:42:47',
            ),
            64 => 
            array (
                'id' => 66,
                'name' => 'salesorder delete',
                'module_name' => 'salesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-16 07:42:55',
                'updated_at' => '2024-11-16 07:42:55',
            ),
            65 => 
            array (
                'id' => 67,
                'name' => 'invoice view',
                'module_name' => 'invoice',
                'guard_name' => 'web',
                'created_at' => '2024-11-22 13:14:25',
                'updated_at' => '2024-11-22 16:46:32',
            ),
            66 => 
            array (
                'id' => 68,
                'name' => 'invoice create',
                'module_name' => 'invoice',
                'guard_name' => 'web',
                'created_at' => '2024-11-22 13:14:34',
                'updated_at' => '2024-11-22 13:14:34',
            ),
            67 => 
            array (
                'id' => 69,
                'name' => 'invoice edit',
                'module_name' => 'invoice',
                'guard_name' => 'web',
                'created_at' => '2024-11-22 13:14:42',
                'updated_at' => '2024-11-22 13:14:42',
            ),
            68 => 
            array (
                'id' => 70,
                'name' => 'invoice delete',
                'module_name' => 'invoice',
                'guard_name' => 'web',
                'created_at' => '2024-11-22 13:14:51',
                'updated_at' => '2024-11-22 13:14:51',
            ),
            69 => 
            array (
                'id' => 71,
                'name' => 'returnsalesorder create',
                'module_name' => 'returnsalesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-22 19:10:55',
                'updated_at' => '2024-11-22 19:10:55',
            ),
            70 => 
            array (
                'id' => 72,
                'name' => 'returnsalesorder view',
                'module_name' => 'returnsalesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-22 19:11:01',
                'updated_at' => '2024-11-22 19:11:01',
            ),
            71 => 
            array (
                'id' => 73,
                'name' => 'returnsalesorder edit',
                'module_name' => 'returnsalesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-22 19:11:36',
                'updated_at' => '2024-11-22 19:11:36',
            ),
            72 => 
            array (
                'id' => 74,
                'name' => 'returnsalesorder delete',
                'module_name' => 'returnsalesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-22 19:11:44',
                'updated_at' => '2024-11-22 19:11:44',
            ),
            73 => 
            array (
                'id' => 75,
                'name' => 'listorder view',
                'module_name' => 'listorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-23 01:53:32',
                'updated_at' => '2024-11-23 01:53:32',
            ),
            74 => 
            array (
                'id' => 76,
                'name' => 'listorder show',
                'module_name' => 'listorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-23 01:53:59',
                'updated_at' => '2024-11-23 01:53:59',
            ),
            75 => 
            array (
                'id' => 77,
                'name' => 'salesorder export',
                'module_name' => 'salesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-23 08:11:32',
                'updated_at' => '2024-11-23 08:11:32',
            ),
            76 => 
            array (
                'id' => 78,
                'name' => 'suratjalan export',
                'module_name' => 'suratjalan',
                'guard_name' => 'web',
                'created_at' => '2024-11-23 08:11:43',
                'updated_at' => '2024-11-23 08:11:43',
            ),
            77 => 
            array (
                'id' => 79,
                'name' => 'invoice export',
                'module_name' => 'invoice',
                'guard_name' => 'web',
                'created_at' => '2024-11-23 08:11:53',
                'updated_at' => '2024-11-23 08:11:53',
            ),
            78 => 
            array (
                'id' => 80,
                'name' => 'returnsalesorder export',
                'module_name' => 'returnsalesorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-23 16:12:39',
                'updated_at' => '2024-11-23 16:12:39',
            ),
            79 => 
            array (
                'id' => 81,
                'name' => 'listorder export',
                'module_name' => 'listorder',
                'guard_name' => 'web',
                'created_at' => '2024-11-23 16:30:02',
                'updated_at' => '2024-11-23 16:30:02',
            ),
            80 => 
            array (
                'id' => 82,
                'name' => 'stockopname create',
                'module_name' => 'stockopname',
                'guard_name' => 'web',
                'created_at' => '2024-11-25 05:04:43',
                'updated_at' => '2024-11-25 05:04:43',
            ),
            81 => 
            array (
                'id' => 83,
                'name' => 'stockopname edit',
                'module_name' => 'stockopname',
                'guard_name' => 'web',
                'created_at' => '2024-11-25 05:04:51',
                'updated_at' => '2024-11-25 05:04:51',
            ),
            82 => 
            array (
                'id' => 84,
                'name' => 'stockopname show',
                'module_name' => 'stockopname',
                'guard_name' => 'web',
                'created_at' => '2024-11-25 05:04:59',
                'updated_at' => '2024-11-25 05:04:59',
            ),
            83 => 
            array (
                'id' => 85,
                'name' => 'stockopname delete',
                'module_name' => 'stockopname',
                'guard_name' => 'web',
                'created_at' => '2024-11-25 05:05:06',
                'updated_at' => '2024-11-25 05:05:06',
            ),
            84 => 
            array (
                'id' => 86,
                'name' => 'stockopname export',
                'module_name' => 'stockopname',
                'guard_name' => 'web',
                'created_at' => '2024-11-25 05:05:19',
                'updated_at' => '2024-11-25 05:05:19',
            ),
            85 => 
            array (
                'id' => 87,
                'name' => 'stockopname view',
                'module_name' => 'stockopname',
                'guard_name' => 'web',
                'created_at' => '2024-11-25 05:57:26',
                'updated_at' => '2024-11-25 05:57:26',
            ),
            86 => 
            array (
                'id' => 88,
                'name' => 'curency view',
                'module_name' => 'curency',
                'guard_name' => 'web',
                'created_at' => '2024-11-28 03:59:05',
                'updated_at' => '2024-11-28 03:59:05',
            ),
            87 => 
            array (
                'id' => 89,
                'name' => 'curency create',
                'module_name' => 'curency',
                'guard_name' => 'web',
                'created_at' => '2024-11-28 03:59:14',
                'updated_at' => '2024-11-28 03:59:14',
            ),
            88 => 
            array (
                'id' => 90,
                'name' => 'curency edit',
                'module_name' => 'curency',
                'guard_name' => 'web',
                'created_at' => '2024-11-28 03:59:20',
                'updated_at' => '2024-11-28 03:59:20',
            ),
            89 => 
            array (
                'id' => 91,
                'name' => 'curency delete',
                'module_name' => 'curency',
                'guard_name' => 'web',
                'created_at' => '2024-11-28 03:59:24',
                'updated_at' => '2024-11-28 03:59:24',
            ),
            90 => 
            array (
                'id' => 92,
                'name' => 'returnpurchase view',
                'module_name' => 'returnpurchase',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:51:10',
                'updated_at' => '2024-11-30 18:51:10',
            ),
            91 => 
            array (
                'id' => 93,
                'name' => 'returnpurchase edit',
                'module_name' => 'returnpurchase',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:51:20',
                'updated_at' => '2024-11-30 18:51:20',
            ),
            92 => 
            array (
                'id' => 94,
                'name' => 'returnpurchase create',
                'module_name' => 'returnpurchase',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:51:27',
                'updated_at' => '2024-11-30 18:51:27',
            ),
            93 => 
            array (
                'id' => 95,
                'name' => 'returnpurchase delete',
                'module_name' => 'returnpurchase',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:51:33',
                'updated_at' => '2024-11-30 18:51:33',
            ),
            94 => 
            array (
                'id' => 96,
                'name' => 'returnpurchase export',
                'module_name' => 'returnpurchase',
                'guard_name' => 'web',
                'created_at' => '2024-11-30 18:51:40',
                'updated_at' => '2024-11-30 18:51:40',
            ),
        ));
        
        
    }
}