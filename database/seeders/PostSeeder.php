<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Filter users helper.
     */
    public function filterUsers(User $user): bool
    {
        return $user->name !== 'Test User';
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all()->filter(
            fn (User $user) => $this->filterUsers($user)
        );

        foreach ($users as $user) {
            Post::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
