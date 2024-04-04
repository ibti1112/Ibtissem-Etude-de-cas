<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectacle extends Model
{
    use HasFactory;

    protected $fillable = [
        'idpiece',
        'datespectacle',
        'idsalle',
    ];

    // Si Spectacle est lié à d'autres tables, définissez les relations ici.

    // Par exemple, si idpiece et idsalle sont liées à d'autres tables :
    
    public function piece()
    {
        return $this->belongsTo(Piece::class, "idpiece");
    }

    public function salle()
    {
        return $this->hasMany(salle::class,"idsalle");

    }
}