<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $existingAdmin = User::where('email', 'admin@bellfordacademy.com')->first();
        
        if (!$existingAdmin) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@bellfordacademy.com',
                'password' => Hash::make('admin123'),
            ]);
            
            $this->command->info('Admin berhasil dibuat!');
            $this->command->info('Email: admin@bellfordacademy.com');
            $this->command->info('Password: admin123');
        } else {
            $this->command->info('Admin sudah ada dengan email: admin@bellfordacademy.com');
        }
    }
}


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $existingAdmin = User::where('email', 'admin@bellfordacademy.com')->first();
        
        if (!$existingAdmin) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@bellfordacademy.com',
                'password' => Hash::make('admin123'),
            ]);
            
            $this->command->info('Admin berhasil dibuat!');
            $this->command->info('Email: admin@bellfordacademy.com');
            $this->command->info('Password: admin123');
        } else {
            $this->command->info('Admin sudah ada dengan email: admin@bellfordacademy.com');
        }
    }
}

