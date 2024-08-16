<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeanceCours extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'date',
        'filiere_id',
    ];

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
