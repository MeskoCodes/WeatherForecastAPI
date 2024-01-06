<?php

namespace Database\Factories;

use App\Models\VremenskiUslovi;
use App\Models\VremenskaStanica;
use Illuminate\Database\Eloquent\Factories\Factory;

class VremenskiUsloviFactory extends Factory
{
    protected $model = VremenskiUslovi::class;

    public function definition()
    {
        return [
            'vremenska_stanica_id' => VremenskaStanica::factory(),
            'opis' => $this->faker->randomElement(['Suncano', 'Oblacno', 'Kisovito', 'Grmljavinska oluja']),
        ];
    }
}
