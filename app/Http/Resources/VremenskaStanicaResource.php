<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class VremenskaStanicaResource extends JsonResource
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
            'nazivStanice'=>$this->naziv_stanice,
            'lokacija'=> LokacijaResource::collection($this->whenLoaded('lokacija')),
            'kvalitetVazduha'=> KvalitetVazduhaResource::collection($this->whenLoaded('kvalitetVazduha')),
            'obavijesti'=> ObavijestiResource::collection($this->whenLoaded('obavijesti')),
            'padavine'=> PadavineResource::collection($this->whenLoaded('padavine')),
            'prognoza'=> PrognozaResource::collection($this->whenLoaded('prognoza')),
            'vremenskiUslovi'=> VremenskiUsloviResource::collection($this->whenLoaded('vremenskiUslovi'))
            
        ];
    }
}
