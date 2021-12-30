<?php

namespace Database\Factories;

use App\Models\Cbt;
use App\Models\CbtQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CbtQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CbtQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cbt_id' => Cbt::factory(),
            'question' => $this->faker->sentence()
        ];
    }
}
