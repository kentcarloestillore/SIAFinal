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
            'firstname'     =>fake()->firstname(),                         
            'lastname'      =>fake()->lastname(),           
            'gender'        =>fake()->randomElement(['male', 'female']),
            'dateOfBirth'   =>fake()->date(),               
            'address'       =>fake()->address(),
            'phone'         =>fake()->numerify('####-###-###'),       
            'jobTitle'      =>fake()->word(),
            'prn'           =>strtoupper(fake()->bothify('??#########??'))    
        ];
    }
}
