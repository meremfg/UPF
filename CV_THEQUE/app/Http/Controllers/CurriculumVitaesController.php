<?php

namespace App\Http\Controllers;

use App\Models\Curriculum_Vitae;
use Illuminate\Http\Request;
use App\Http\Resources\Curriculum_VitaeResource as cvResource;
class CurriculumVitaesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $request
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        return view('curriculum_Vitae.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'etudiant_cin'    =>  'required',

        ]);
        $curriculum_Vitae= new Curriculum_Vitae([
            'etudiant_cin'    =>  $request->get('etudiant_cin'),

        ]);
        $curriculum_Vitae->save();
        return redirect()->route('curriculum_Vitae.index')->with('success', 'Données ajoutées');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curriculum_Vitae = Curriculum_Vitae::find($id);
        return view('curriculum_Vitae.edit', compact('curriculum_Vitae', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'etudiant_cin'    =>  'required',
        ]);
        $curriculum_Vitae = Curriculum_Vitae::find($id);
        $curriculum_Vitae->etudiant_cin = $request->get('etudiant_cin');
        $curriculum_Vitae->save();
        return redirect()->route('$curriculum_Vitae.index')->with('success', 'Données mises à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curriculum_Vitae = Curriculum_Vitae::find($id);
        $curriculum_Vitae->delete();
        return redirect()->route('curriculum_Vitae.index')->with('success', 'Données supprimées');
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
       $cvs = Curriculum_Vitae::with('experiences','experimentals','formations','loisirs','competences')->
       orWhereHas('experiences', function (Builder $query) {
        $query
        ->orWhere('Societe', 'like', '%' .  $request->experience . '%')
        ->orWhere('Mission', 'like', '%' .  $request->experience . '%');
    })
    ->orWhereHas('experimentals', function (Builder $query) {
        $query
        ->where('Societe', 'like', '%' .  $request->experimental . '%');
    })
    ->orWhereHas('formations', function (Builder $query) {
        $query
        ->where('Formation', 'like', '%' .  $request->formation . '%');
    })
    ->orWhereHas('loisirs', function (Builder $query) {
        $query
        ->where('centre_d_interet', 'like', '%' .  $request->loisir . '%');
    })
    ->orWhereHas('competences', function (Builder $query) {
        $query
        ->orWhere('logiciel', 'like', '%' .  $request->competence . '%')
        ->orWhere('ProjetRealiser', 'like', '%' .  $request->competence . '%')
        ->orWhere('langues', 'like', '%' .  $request->competence . '%');
    })
    ->get();
    
    return cvResource::collection($cvs);
    }
}
