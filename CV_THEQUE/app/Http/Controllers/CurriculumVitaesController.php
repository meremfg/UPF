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
        $cvs= new \Illuminate\Database\Eloquent\Collection;
        if( $request->experience ){
            $cvs1 = Curriculum_Vitae::with('experiences')->
            whereHas('experiences', function ($query) use ( $request) {
                $query
                ->where('Societe', 'like', '%' .  $request->experience . '%');
            })->get();
            $cvs= new \Illuminate\Database\Eloquent\Collection;
        $cvs = $cvs->merge($cvs1);
   
        }
        if( $request->experimental ){
            $cvs2 = Curriculum_Vitae::with('experimentals')->
            whereHas('experimentals', function ($query) use ( $request) {
                $query
                ->where('Societe', 'like', '%' .  $request->experience . '%');
            })->get();
            $cvs = $cvs->merge($cvs2);

        }
        if( $request->formation ){
            $cvs3 = Curriculum_Vitae::with('formations')->
            whereHas('formations', function ($query) use ( $request) {
                $query
                ->where('Formation', 'like', '%' .  $request->formation . '%');
            })->get();
            $cvs = $cvs->merge($cvs3);

        }
        if( $request->loisir ){
            $cvs4 = Curriculum_Vitae::with('loisirs')->
            whereHas('loisirs', function ($query) use ( $request) {
                $query
                ->where('centre_d_interet', 'like', '%' .  $request->loisir . '%');
            })->get();
            $cvs = $cvs->merge($cvs4);

        }
        if( $request->competences ){
            $cvs5 = Curriculum_Vitae::with('competences')->
            whereHas('competences', function ($query) use ( $request) {
                $query
                ->orWhere('logiciel', 'like', '%' .  $request->competence . '%')
        ->orWhere('ProjetRealiser', 'like', '%' .  $request->competence . '%')
        ->orWhere('langues', 'like', '%' .  $request->competence . '%');
            })->get();
            $cvs = $cvs->merge($cvs5);

        }
        
        // $cvs = $cvs->uninque();
        return view('recruteur.cvs')->with('cvs',$cvs);
    //    $cvs = Curriculum_Vitae::with('experiences','experimentals','formations','loisirs','competences')->
    //    whereHas('experiences', function ($query) use ( $request) {
    //     $query
    //     ->orWhere('Societe', 'like', '%' .  $request->experience . '%')
    //     ->orWhere('Mission', 'like', '%' .  $request->experience . '%');
    // })
    // ->whereHas('experimentals', function($query) use ( $request) {
    //     $query
    //     ->where('Societe', 'like', '%' .  $request->experimental . '%');
    // })
    // ->whereHas('formations', function($query) use ( $request) {
    //     $query
    //     ->where('Formation', 'like', '%' .  $request->formation . '%');
    // })
    // ->whereHas('loisirs', function ($query) use ( $request)  {
    //     $query
    //     ->where('centre_d_interet', 'like', '%' .  $request->loisir . '%');
    // })
    // ->whereHas('competences', function ($query) use ( $request)  {
    //     $query
    //     ->orWhere('logiciel', 'like', '%' .  $request->competence . '%')
    //     ->orWhere('ProjetRealiser', 'like', '%' .  $request->competence . '%')
    //     ->orWhere('langues', 'like', '%' .  $request->competence . '%');
    // })
    // ->get();
    // return view('recruteur.cvs')->with('cvs',$cvs);
    // return cvResource::collection($cvs);
    }
}
