<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PrognozaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'ID'=>$this->id,
            'Datum'=>$this->datum,
            'vremenskaStanicaId'=>$this->vremenska_stanica_id,
            'Temperatura'=>$this->temperatura,
            'pritisakVazduha'=>$this->pritisak_vazduha,
            'vlaznostVazduha'=>$this->vlaznost_vazduha,
            'brzinaVetra'=>$this->brzina_vetra,
            'smerVetra'=>$this->smer_vetra
        ];
    }
}
