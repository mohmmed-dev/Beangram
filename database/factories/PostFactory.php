<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = ['posts/img_1.png','posts/img_2.png','posts/img_3.png','posts/img_4.png',['posts/img_6.png','posts/img_5.png'],['posts/img_8.png','posts/img_7.png']];
        $count = count($images) - 1;
        return [
            'description' => fake()->sentence(),
            'slug' => fake()->regexify('[A-Za-z0-9]{10}'),
            'user_id' => User::factory(),
            'file_type' => "image",
            'file' => json_encode($images[rand(0,$count)])
        ];
    }
}
