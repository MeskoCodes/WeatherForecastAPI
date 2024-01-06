<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VremenskaStanica extends Model
{

    protected $fillable = ['naziv_stanice'];

    use HasFactory;


    public function Lokacija(){
        return $this->hasMany(Lokacija::class);
    }

    public function KvalitetVazduha(){
        return $this->hasMany(KvalitetVazduha::class);
    }

    public function Obavijesti(){
        return $this->hasMany(Obavijesti::class);
    }

    public function Padavine(){
        return $this->hasMany(Padavine::class);
    }

    public function Prognoza(){
        return $this->hasMany(Prognoza::class);
    }

    public function VremenskiUslovi(){
        return $this->hasMany(VremenskiUslovi::class);
    }
}
