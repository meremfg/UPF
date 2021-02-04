<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Curriculum_VitaeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'cin'=>$this->etudiant->cin,
            'cne'=>$this->etudiant->cne,
            'nom'=>$this->etudiant->nom,
            'prenom'=>$this->etudiant->prenom,
        ];
    }
}
