<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prognoza extends Model
{
    protected $fillable =[
        'vremenska_stanica_id',
        'datum',
        'temperatura',
        'pritisak_vazduha',
        'vlaznost_vazduha',
        'brzina_vetra',
        'smer_vetra'];

        use HasFactory;
    
    public function vremenska_stanica(){
        return $this->belongsTo(VremenskaStanica::class);
    }

    public function Padavine(){
        return $this->hasMany(Padavine::class);
    }

    public function KvalitetVazduha()
    {
        return $this->hasMany(KvalitetVazduha::class);
    }

}
