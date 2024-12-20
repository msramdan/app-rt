<?php

namespace Database\Seeders;

use App\Models\AduanWarga;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(SettingAppSeeder::class);
        $this->call(WargaSeeder::class);
        $this->call(AduanWargaSeeder::class);
        $this->call(KegiatanWargaSeeder::class);
    }
}
