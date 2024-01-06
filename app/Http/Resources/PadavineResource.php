<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PadavineResource extends JsonResource
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
            'vremenskaStanicaId'=>$this->vremenska_stanica_id,
            'prognozaId'=>$this->prognoza_id,
            'Datum'=>$this->datum,
            'kolicinaPadavina'=>$this->kolicina_padavina,
        ];
    }
}
