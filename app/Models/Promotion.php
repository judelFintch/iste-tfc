<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'annee',
    ];

    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }
}
