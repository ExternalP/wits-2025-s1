<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = $this->faker->unique()->regexify('[A-Z]{3}');
        return [
            'package_id' => Package::inRandomOrder()->first(),
            // 'national_code' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{5}'),
            'national_code' => $this->faker->unique()->regexify($code.'[0-9]{5}'),
            'aqf_level' => $this->faker->randomElement([
                'Certificate I in',
                'Certificate II in',
                'Certificate III in',
                'Certificate IV in',
                'Diploma of',
                'Advanced Diploma of',
                'Graduate Diploma of',
                'Graduate Certificate In',
            ]),
            'title' => $this->faker->jobTitle(),
            'tga_status' => $this->faker->randomElement(['Current', 'Replaced', 'Expired']),
            // 'state_code' => $this->faker->regexify('[A-Z]{3}[0-9]{1}'),
            'state_code' => $this->faker->regexify($code.'[0-9]{1}'),
            'nominal_hours' => $this->faker->numberBetween(1,1500),
            'type' => 'Qualification',
        ];
    }
}
