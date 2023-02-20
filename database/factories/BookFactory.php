<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->unique()->sentence(),
            'author' => $this->faker->randomElement(['Mr Joe', 'Mr Kyle', 'Mr Mosh', 'Ms Jene', 'Mrs Caroline']),
            'genre' => $this->faker->randomElement(['Programming', 'Data', 'Cloud & Networking', 'Web Development', 'Mobile', 'Business & Other', 'Game Development', 'Security', 'IoT & Hardware']),
            'description' => $this->faker->text(),
            'isbn' => $this->faker->unique()->numberBetween(1111111111111, 9999999999999),
            'image' => 'http://placeimg.com/480/640/any?t=' . $this->faker->unique()->numberBetween(1111111111111, 9999999999999),
            //'image' => $this->faker->randomElement(['http://placeimg.com/480/640/any', 'http://placeimg.com/480/640/tech', 'http://placeimg.com/480/640/arch', 'http://placeimg.com/480/640/people', 'http://placeimg.com/480/640/nature', 'http://placeimg.com/480/640/animal']),
            'published' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'publisher' => $this->faker->randomElement(['Sybex', 'Wiley', 'Mosh', 'Packt'])
        ];
    }
}
