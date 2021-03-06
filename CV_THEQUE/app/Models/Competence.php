<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $fillable = [

        'logiciel',
        'ProjetRealiser',
        'langues',
        'cv_id',


    ];
    public function cv()
    {
        return $this->belongsTo('App\Models\Curriculum_Vitae','cv_id','id');
    }
}
