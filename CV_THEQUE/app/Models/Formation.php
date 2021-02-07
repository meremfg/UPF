<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'DateDebutDeFormation',
        'DateFinFormation',
        'Formation',
        'LieuFormation',
        'cv_id',


    ];
    public function cv()
    {
        return $this->belongsTo('App\Models\Curriculum_Vitae','cv_id','id');
    }
}
