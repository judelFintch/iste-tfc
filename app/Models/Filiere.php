<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'promotion_id',
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function seances()
    {
        return $this->hasMany(SeanceCours::class);
    }
}
