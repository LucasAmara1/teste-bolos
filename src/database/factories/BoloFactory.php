<?php

namespace Database\Factories;

use App\Models\Bolo;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bolo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->words(1, true),
            'peso' => $this->faker->numberBetween(500, 4000),        
            'valor' => $this->faker->numberBetween(3000, 20000),
            'quantidade' => $this->faker->numberBetween(0, 10),                
        ];
    }
}
