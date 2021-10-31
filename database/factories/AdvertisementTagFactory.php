<?php

namespace Database\Factories;

use AdvertisementTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdvertisementTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => $this->faker->numberBetween(1, 300),
            'advertisement_id' => $this->faker->numberBetween(1, 1000)
        ];
    }
}