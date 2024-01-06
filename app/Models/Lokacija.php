<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokacija extends Model
{
    protected $fillable = ['vremenska_stanica_id','grad', 'drzava'];
    
    use HasFactory;
    
    public function vremenska_stanica(){
        return $this->belongsTo(VremenskaStanica::class);
    }
}
