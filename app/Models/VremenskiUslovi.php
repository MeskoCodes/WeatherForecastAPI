<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VremenskiUslovi extends Model
{
    protected $fillable = ['vremenska_stanica_id','opis'];
    use HasFactory;
    public function vremenska_stanica(){
        return $this->belongsTo(VremenskaStanica::class);
    }
}
