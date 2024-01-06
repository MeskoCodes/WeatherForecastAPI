<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KvalitetVazduha extends Model
{

    use HasFactory;

    protected $fillable=[
    'vremenska_stanica_id',
    'pm10',
    'pm2_5',
    'so2',
    'co',
    'o3',
    'azot_dioksid',
    'sumpordioksid'
    ];

    public function vremenska_stanica(){
        return $this->belongsTo(VremenskaStanica::class);
    }
    public function Prognoza()
    {
        return $this->belongsTo(Prognoza::class);
    }
}
