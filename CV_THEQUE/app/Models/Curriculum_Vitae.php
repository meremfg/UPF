<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum_Vitae extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_cin',
    ];
    public function etudiant()
    {
        return $this->belongsTo('App\Models\Etudiant','etudiant_cin','cin');
    }
    public function experiences()
    {
        return $this->hasMany('App\Models\Experience_Professionnelle','cv_id','id');
    }
    public function experimentals()
    {
        return $this->hasMany('App\Models\Experimental','cv_id','id');
    }
    public function formations()
    {
        return $this->hasMany('App\Models\Formation','cv_id','id');
    }
    public function loisirs()
    {
        return $this->hasMany('App\Models\Loisir','cv_id','id');
    }
    public function competences()
    {
        return $this->hasMany('App\Models\Competence','cv_id','id');
    }

}
