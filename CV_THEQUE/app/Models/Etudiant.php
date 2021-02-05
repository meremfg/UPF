<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = [
        
        'cin',
        'cne',
        'nom',
        'prenom',
        'dateDeNaissance',
        'sexe',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function cvs()
    {
        return $this->hasMany('App\Models\Curriculum_Vitae','etudiant_cin','cin');
    }
}
