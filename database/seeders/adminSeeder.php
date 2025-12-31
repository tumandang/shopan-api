<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name'=> 'Admin123',
            'email' => 'shopan@gmail.com',
            'password' => bcrypt('qwerty123'),
            'is_customers' => false
        ]);

        Admin::create([
            'user_id'=> $user->id,
            'branch' => 'Malaysia'
        ]);
    }
}
