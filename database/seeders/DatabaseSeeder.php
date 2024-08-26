<?php

namespace Database\Seeders;

use App\Models\post;
use App\Models\User;
use App\Models\comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(10)->has(Post::factory()->count(3))->create();
    }
}
