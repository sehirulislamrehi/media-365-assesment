<?php

namespace Database\Seeders\UserModule;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("DELETE FROM sub_modules");
        DB::table('sub_modules')->insert([

            [
                'id' => 1,
                'name' => 'Users',
                'key' => 'manage_user',
                'position' => 1,
                'route' => 'admin.user-module.user.index',
                'module_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Roles',
                'key' => 'manage_role',
                'position' => 2,
                'route' => 'admin.user-module.role.index',
                'module_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'File Processing',
                'key' => 'file_processing',
                'position' => 2,
                'route' => 'admin.user-module.file_processing.index',
                'module_id' => 1,
            ],
        ]);
    }
}
