<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VremenskaStanica;
use Database\Factories\LokacijaFactory;
use Database\Factories\PadavineFactory;
use Database\Factories\PrognozaFactory;
use Database\Factories\VremenskiUsloviFactory;
use Database\Factories\ObavijestiFactory;
use Database\Factories\KvalitetVazduhaFactory;

class VremenskaStanicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VremenskaStanica::factory()
            ->count(1)
            ->create()
            ->each(function ($vremenskaStanica) {
                $vremenskaStanica->lokacija()->createMany(
                    LokacijaFactory::new()->count(10)->make()->each(function ($lokacija) use ($vremenskaStanica) {
                        $lokacija->vremenska_stanica_id = $vremenskaStanica->id;
                    })->toArray()
                );

                $vremenskaStanica->kvalitetVazduha()->createMany(
                    KvalitetVazduhaFactory::new()->count(10)->make()->each(function ($kvalitetVazduha) use ($vremenskaStanica) {
                        $kvalitetVazduha->vremenska_stanica_id = $vremenskaStanica->id;
                    })->toArray()
                );

                $vremenskaStanica->obavijesti()->createMany(
                    ObavijestiFactory::new()->count(10)->make()->each(function ($obavijesti) use ($vremenskaStanica) {
                        $obavijesti->vremenska_stanica_id = $vremenskaStanica->id;
                    })->toArray()
                );

                $vremenskaStanica->padavine()->createMany(
                    PadavineFactory::new()->count(10)->make()->each(function ($padavine) use ($vremenskaStanica) {
                        $padavine->vremenska_stanica_id = $vremenskaStanica->id;
                    })->toArray()
                );

                $vremenskaStanica->prognoza()->createMany(
                    PrognozaFactory::new()->count(10)->make()->each(function ($prognoza) use ($vremenskaStanica) {
                        $prognoza->vremenska_stanica_id = $vremenskaStanica->id;
                    })->toArray()
                );

                $vremenskaStanica->vremenskiUslovi()->createMany(
                    VremenskiUsloviFactory::new()->count(10)->make()->each(function ($vremenskiUslovi) use ($vremenskaStanica) {
                        $vremenskiUslovi->vremenska_stanica_id = $vremenskaStanica->id;
                    })->toArray()
                );
            });
    }
}
