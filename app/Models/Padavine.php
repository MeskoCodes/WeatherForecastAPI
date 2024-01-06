<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padavine extends Model
{
    protected $fillable = ['vremenska_stanica_id','datum', 'kolicina_padavina', 'prognoza_id'];
    use HasFactory;
    public function vremenska_stanica(){
        return $this->belongsTo(VremenskaStanica::class);
    }
    public function Prognoza()
    {
        return $this->belongsTo(Prognoza::class);
    }
}
