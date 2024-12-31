<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all()->filter(
            fn ($user) => $user->name !== 'Test User'
        );

        foreach ($users as $user) {
            Post::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
