<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'sfadmin@selfinance.com',
            'password' => Hash::make('adminpassword'),
        ]);

        Client::create([
            'user_id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email,
            'phone_number' => '000000000',
            'balance' => 0.00,
        ]);
    }
}
