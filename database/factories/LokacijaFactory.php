<?php

namespace Database\Factories;

use App\Models\Lokacija;
use App\Models\VremenskaStanica;
use Illuminate\Database\Eloquent\Factories\Factory;

class LokacijaFactory extends Factory
{
    protected $model = Lokacija::class;

    private $lokacija = [
        'Podgorica' => 'Crna Gora',
        'Beograd' => 'Srbija',
        'Sarajevo' => 'Bosna i Hercegovina',
        'Zagreb' => 'Hrvatska',
        'Tirana' => 'Albanija',
        'Prag' => 'Republika Ceska',
        'Pariz' => 'Francuska',
        'Cirih' => 'Svajcarska',
        'Berlin' => 'Njemacka',
        'Bec' => 'Austrija',
    ];

    public function definition()
    {
        $grad = $this->faker->randomElement(array_keys($this->lokacija));

        return [
            'vremenska_stanica_id' => VremenskaStanica::factory(),
            'grad' => $grad,
            'drzava' => $this->lokacija[$grad],
        ];
    }
}
