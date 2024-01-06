<?php

namespace Database\Factories;

use App\Models\KvalitetVazduha;
use App\Models\VremenskaStanica;
use Illuminate\Database\Eloquent\Factories\Factory;

class KvalitetVazduhaFactory extends Factory
{
    protected $model = KvalitetVazduha::class;

    public function definition()
    {
        return [
            'vremenska_stanica_id' => VremenskaStanica::factory(),
            'pm10' => $this->faker->randomFloat(2, 0, 500),
            'pm2_5' => $this->faker->randomFloat(2, 0, 200),
            'so2' => $this->faker->randomFloat(2, 0, 50),
            'co' => $this->faker->randomFloat(2, 0, 10),
            'o3' => $this->faker->randomFloat(2, 0, 100),
            'azot_dioksid' => $this->faker->randomFloat(2, 0, 50),
            'sumpordioksid' => $this->faker->randomFloat(2, 0, 20),
        ];
    }
}
