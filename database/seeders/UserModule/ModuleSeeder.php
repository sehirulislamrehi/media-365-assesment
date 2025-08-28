<?php

namespace Database\Seeders\UserModule;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("DELETE FROM modules");
        DB::table('modules')->insert([
            [
                'id' => 1,
                'name' => 'User Module',
                'key' => 'user_module',
                'icon' => 'fa fa-user',
                'position' => 1,
                'route' => null,
                'left_menu_visibility'=>true
            ],
        ]);
        cache()->forget('sidebarModules');
    }
}
