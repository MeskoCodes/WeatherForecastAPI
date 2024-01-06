<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Obavijesti;
use App\Models\VremenskaStanica;

class ObavijestiFactory extends Factory
{
    protected $model = Obavijesti::class;

    // Rječnik koji mapira tipove obaveštenja na odgovarajuće sadržaje
    private $obavijesti = [
        'Promjena Vremenskih Uslova' => 'Očekuje se nagli pad temperature i pojačanje vetra u narednim satima',
        'Vremensko upozorenje' => 'Upozorenje na jake pljuskove i poplave u području.',
        'Upozorenje na zagađenje vazduha' => 'Visok nivo PM2.5 zagađenja vazduha. Preporučuje se izbegavanje boravka na otvorenom',
        'Poboljšanje Vremenskih Uslova' => 'Nepovoljni vremenski uslovi su se smirili. Očekuje se stabilizacija vremena',
        'Vremensko Upozorenje' => 'Upozorenje na jake pljuskove i poplave u području u narednih 24h',
    ];

    public function definition()
    {
        $tipObavijesti = $this->faker->randomElement(array_keys($this->obavijesti));

        return [
            'vremenska_stanica_id' => VremenskaStanica::factory(),
            'tip_obavijesti' => $tipObavijesti,
            'sadrzaj' => function (array $attributes) use ($tipObavijesti) {
                return $this->obavijesti[$tipObavijesti];
            },
        ];
    }
}
