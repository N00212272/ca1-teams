<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //means it chooses this db and uses a fake word,text or name
            'name' => $this->faker->word,
            'user_id' => 3,
            'category' => $this->faker->text(30),
            'description' => $this->faker->text(200),
            'team_image' => "team_placeholder.jpg",
            'sponsor' => $this->faker->name
        ];
    }
}
