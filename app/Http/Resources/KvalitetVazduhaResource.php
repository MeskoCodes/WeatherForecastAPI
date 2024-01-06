<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KvalitetVazduhaResource extends JsonResource
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
            'PM10'=>$this->pm10,
            'PM25'=>$this->pm2_5,
            'SO2'=>$this->so2,
            'CO'=>$this->co,
            'O3'=>$this->o3,
            'azotDioksid'=>$this->azot_dioksid,
            'sumporDioksid'=>$this->sumpordioksid,
        ];
    }
}
