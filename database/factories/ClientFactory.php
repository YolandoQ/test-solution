<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'cpf' => $this->faker->unique()->numerify('###.###.###-##'),
            'data_nascimento' => $this->faker->date('Y-m-d', '-18 years'),
            'sexo' => $this->faker->randomElement(['masculino', 'feminino']),
            'endereco' => $this->faker->address,
            'cidade' => strtoupper($this->faker->city),
            'estado' => strtoupper($this->faker->state),
        ];
    }
}
