<?php

namespace App\Http\Controllers;

use App\Models\Experience_Professionnelle;
use Illuminate\Http\Request;

class ExperienceProfessionnelleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.change_cv');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contenu()
    {
        return view('contenu');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $lastid=Curriculum_Vitae::create($data)->id;
        if(count($request->DateDebut) > 0) {
            foreach($request->DateDebut as $item=>$v){
                $data2=array(

                    'DateDebut'  =>  $request->DateDebut[$item],
                    'DateFin'    =>  $request->DateFin[$item],
                    'Societe'    =>  $request->Societe[$item],
                    'Mission'    =>  $request->Mission[$item],
                    'Duree'    =>  $request->Duree[$item],
                    'cv_id'   =>$lastid,
                );
                Experience_Professionnelle::insert($data2);
            }
        }
        return redirect()->back()->with('success','data insert successfully');


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
        $experience_professionnelle = Experience_Professionnelle::find($id);
        return view('formation.edit', compact('experience_Professionnelle', 'id'));
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
            'DateDebut'    =>  'required',
            'DateFin'             =>  'required',
            'Societe'             =>  'required',
            'Mission'             =>  'required',
            'Duree'             =>  'required',
            'cv_id'             =>  'required',

        ]);
        $experience_professionnelle = Experience_Professionnelle::find($id);
        $experience_professionnelle->DateDebut = $request->get('DateDebut');
        $experience_professionnelle->DateFin = $request->get('DateFin');
        $experience_professionnelle->Societe = $request->get('Societe');
        $experience_professionnelle->Mission = $request->get('Mission');
        $experience_professionnelle->Duree = $request->get('Duree');
        $experience_professionnelle->cv_id = $request->get('cv_id');
        $experience_professionnelle->save();
        return redirect()->route('experience_Professionnelle.index')->with('success', 'Données mises à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience_professionnelle = Experience_Professionnelle::find($id);
        $experience_professionnelle->delete();
        return redirect()->route('experience_Professionnelle.index')->with('success', 'Données supprimées');
    }
}
