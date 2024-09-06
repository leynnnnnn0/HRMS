<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName' => $this->faker->firstName(),
            'middleName' => null,
            'lastName' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'dateOfBirth' => $this->faker->date(),
            'phoneNumber' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'streetAddress' => $this->faker->address(),
            'cityOrProvince' => $this->faker->city(),
            'municipality' => $this->faker->word(),
            'postalCode' => $this->faker->postcode(),
        ];
    }
}
