<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '08777123123',
                'email_verified_at' => NULL,
                'image_url' => '',
                'password' => '$2y$10$13ew7nKizsnvZ1eLJg7ypOJHrxDC97oZM3eEm3n24OV1nx2GIqTmC',
                'remember_token' => NULL,
                'is_active' => '1',
                'deleted_at' => NULL,
                'created_at' => '2023-02-17 08:46:34',
                'updated_at' => '2023-02-21 02:57:56',
            ],
        ]);
    }
}
