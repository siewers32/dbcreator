<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $countries = array('da_DK', 'nl_NL', 'be_BE', 'no_NO', 'pl_PL', 'sw_SW', 'de_DE', 'el_GR', 'en_GB','es_ES');
        foreach($countries as $country) {
            
        }
        return [
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
        ];
    }
}
