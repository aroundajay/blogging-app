<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed posts
        Post::factory(10)->create();

        // seed user
        $email = 'test@example.com';
        if (!User::whereEmail($email)->exists()) {
            User::factory()->create([
                'email' => $email,
            ]);
        }
    }
}
