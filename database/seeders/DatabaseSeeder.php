<?php

namespace Database\Seeders;

use Database\Seeders\UserModule\ModuleSeeder;
use Database\Seeders\UserModule\PermissionSeeder;
use Database\Seeders\UserModule\SubModuleSeeder;
use Database\Seeders\UserModule\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ModuleSeeder::class,
            SubModuleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
