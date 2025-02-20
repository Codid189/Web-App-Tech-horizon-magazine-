<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Theme;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('Password'),
            'rule' => 'Admin',
        ]);
        User::factory()->create([
            'name' => 'responsable1',
            'email' => 'cybre@gmail.com',
            'password' => Hash::make('Password'),
            'rule' => 'Responsable',
        ]);
        User::factory()->create([
            'name' => 'responsable2',
            'email' => 'ai@gmail.com',
            'password' => Hash::make('Password'),
            'rule' => 'Responsable',
        ]);
        User::factory()->create([
            'name' => 'responsable3',
            'email' => 'reseau@gmail.com',
            'password' => Hash::make('Password'),
            'rule' => 'Responsable',
        ]);
        User::factory()->create([
            'name' => 'responsable4',
            'email' => 'virtual@gmail.com',
            'password' => Hash::make('Password'),
            'rule' => 'Responsable',
        ]);
      
        Theme::create([
            'name' => 'Cyber-Sécurité',
            'description' => 'Sécurité des systèmes informatiques et protection des données',
        ]);

        Theme::create([
            'name' => 'Intelligence Artificielle',
            'description' => 'Machine learning, deep learning et applications IA',
        ]);

        Theme::create([
            'name' => 'Réseaux',
            'description' => 'Infrastructure réseau, protocoles et administration',
        ]);

        Theme::create([
            'name' => 'Virtualisation',
            'description' => 'Technologies de virtualisation et cloud computing',
        ]);
    }
}
