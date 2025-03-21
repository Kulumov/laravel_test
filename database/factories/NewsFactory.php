<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "author_id" => User::pluck("id")->toArray()[0],
            "name" => $this->faker->sentence(4, true),
            "description" => $this->faker->paragraph(20, true),
            "image" => 'images/dummy_image.jpg',
        ];
    }
}
