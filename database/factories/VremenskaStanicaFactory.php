<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VremenskaStanica;

class VremenskaStanicaFactory extends Factory
{
    protected $model = VremenskaStanica::class;

    public function definition()
    {
        $naziv_stanice = $this->faker->randomElement
        (['Meteorološka stanica Podgorica',
        'Republički hidrometeorološki zavod',
        'Federalni hidrometeorološki zavod Bosne i Hercegovine',
        'Zagrebački meteorološki observatorij',
        'Instituti i Meteorologjisë dhe Hidrologjisë',
        'Český hydrometeorologický ústav',
        'Météo-France',
        'Service météorologique suisse',
        'Deutscher Wetterdienst',
        'Zentralanstalt für Meteorologie und Geodynamik',]);

        return [
            'naziv_stanice' => $naziv_stanice,
            // ostali atributi
        ];
    }
}

