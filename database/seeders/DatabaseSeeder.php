<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Database\Seeders\MajorSeeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\SettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'phone' => '12345678910',
            'role' => 'admin'
        ]);

        $this->call([
            MajorSeeder::class,
            DoctorSeeder::class,
            SettingSeeder::class
        ]);
    }
}
