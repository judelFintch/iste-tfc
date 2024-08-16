<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reinscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'etudiant_id',
        'valide',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
