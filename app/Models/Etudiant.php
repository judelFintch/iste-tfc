<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'filiere_id',
        'is_reinscrit',
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
