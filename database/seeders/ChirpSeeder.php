<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::count() < 3 ? [
            User::create([
                'name' => 'Alice Dian',
                'email' => 'alice@gmail.com',
                'password' => bcrypt('password2'),
            ]),
            User::create([
                'name' => 'Balmond Hede',
                'email' => 'balmond@gmail.com',
                'password' => bcrypt('password3'),
            ]),
            User::create([
                'name' => 'Alucard Cruz',
                'email' => 'alux@gmail.com',
                'password' => bcrypt('password4'),
            ]),

        ] : User::take(3)->get();

        $chirps = [
            'The card looks wide because the container controls it.',
            'Fixed the width by correcting max-w-2xl.',
            "Cards don't set width — containers do.",
            'One typo can break your whole layout 😅',
            'Tailwind classes decide everything.',
            'Centered with mx-auto, simple fix.',
            'Parent div equals card size.',
            'Clean layout starts with correct width.',
            'DaisyUI card just fills the space.',
            'Small change, big UI difference.',
        ];

        foreach ($chirps as $message) {
            $users->random()->chirps()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }

    }
}
