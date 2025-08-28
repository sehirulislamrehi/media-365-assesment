<?php

namespace Database\Seeders\UserModule;

use App\Enum\Modules\UserModule\UserTiersEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("DELETE FROM users where id = 1");
        DB::table('users')->insert([
            [
                "id" => 1,
                "name" => "Super Admin",
                "email" => "superadmin@gmail.com",
                "phone" => "1234567890",
                "password" => Hash::make("123456"),
                "is_super_admin" => true,
                "is_active" => true,
                "user_tiers" => UserTiersEnum::ENTERPRISE->value,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ]);
    }
}
