<?php

namespace Database\Factories;

use App\Models\Prognoza;
use App\Models\VremenskaStanica;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrognozaFactory extends Factory
{
    protected $model = Prognoza::class;

    public function definition()
    {
        return [
            'vremenska_stanica_id' => VremenskaStanica::factory(),
            'datum' => $this->faker->date(),
            'temperatura' => $this->faker->randomFloat(2, -20, 40),
            'pritisak_vazduha' => $this->faker->randomFloat(2, 900, 1100),
            'vlaznost_vazduha' => $this->faker->randomFloat(2, 20, 90),
            'brzina_vetra' => $this->faker->NumberBetween(1, 50),
            'smer_vetra' => $this->faker->randomElement(['Sever', 'Severoistok', 'Istok', 'Jugoistok', 'Jug', 'Jugozapad', 'Zapad', 'Severozapad']),
            // Dodajte ostale atribute prema vašem modelu Prognoza
        ];
    }
}
