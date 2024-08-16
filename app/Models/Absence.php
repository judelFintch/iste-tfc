<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'etudiant_id',
        'seance_cours_id',
        'is_absent',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function seanceCours()
    {
        return $this->belongsTo(SeanceCours::class);
    }
}
