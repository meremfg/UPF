<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loisir extends Model
{
    use HasFactory;
    protected $fillable = [
        'centre_d_interet',
        'cv_id',

    ];
    public function cv()
    {
        return $this->belongsTo('App\Models\Curriculum_Vitae','cv_id','id');
    }
}
