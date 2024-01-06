<?php

namespace Database\Factories;
use App\Models\Padavine;
use App\Models\VremenskaStanica;
use App\Models\Prognoza;
use Illuminate\Database\Eloquent\Factories\Factory;

class PadavineFactory extends Factory
{
    protected $model = Padavine::class;

    public function definition()
    {
        return [
            'vremenska_stanica_id' => VremenskaStanica::factory(),
            'prognoza_id' => Prognoza::factory(),
            'datum' => $this->faker->date(),
            'kolicina_padavina' => $this->faker->randomFloat(2, 0, 100), // Generisanje slučajnog broja sa dve decimale između 0 i 100
        ];
    }
}
