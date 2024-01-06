<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obavijesti extends Model
{
    protected $fillable = ['vremenska_stanica_id','tip_obavijesti', 'sadrzaj'];
    use HasFactory;
    public function vremenska_stanica(){
        return $this->belongsTo(VremenskaStanica::class);
    }
}
