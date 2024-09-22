<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [
            //     'name' => 'Admin',
            //     'email' => 'admin@gmail.com',
            //     'password' => Hash::make('123456'),
            //     'is_admin' => 1
            // ],
            DB::table('admins')->insert([
                [
                    'name' => 'Admin Arvinder Arora',
                    'email' => 'arvinderarora76@gmail.com',
                    'password' => Hash::make('Arvinder@1234'),
                    'is_admin' => 1,
                ],
                [
                    'name' => 'Admin Sonia',
                    'email' => 'iinteriofy@gmail.com',
                    'password' => Hash::make('Iinteriofy@1234'),
                    'is_admin' => 1,
                ],
            ]);
            
    }
}
