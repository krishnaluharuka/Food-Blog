<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Website>
 */
class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model=Website::class;

    public function definition(): array
    {

        return [
            'website_title'=>fake()->name(),
            'logo'=>fake()->imageUrl(),
            'contact'=>fake()->phoneNumber(),
            'email'=>fake()->email(),
            'fb_link'=>fake()->url(),
            'whatsapp_link'=>fake()->url(),
            'pinterest_Link'=>fake()->url(),
            'insta_Link'=>fake()->url(),
        ];
    }
}
