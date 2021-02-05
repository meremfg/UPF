@extends('layouts.app')


@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" >sdf</button>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <form method="get" action="search-cv" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search"  id="experience" name="experience" placeholder="experiences"value={{Request::get('experience') }} >
      <input class="form-control mr-sm-2" type="search" id="experimental"  name="experimental" placeholder="experimentals"value={{ app('request')->input('experimental') }}>
      <input class="form-control mr-sm-2" type="search" id="formation"  name="formation"  placeholder="formations"value={{ app('request')->input('formation') }}>
      <input class="form-control mr-sm-2" type="search" id="loisir"   name="loisir" placeholder="loisirs"value={{ app('request')->input('loisir') }}>
      <input class="form-control mr-sm-2" type="search" id="competence"  name="competence"  placeholder="competences"value={{ app('request')->input('competence') }}>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <h2>Available cvs</h2>
        </div>
    </div>
    
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered" style="margin-top:20px;">
 <tr>
   <th>CNE</th>
   <th>Nom</th>
   <th>Prenom</th>
   <th>date De Naissance</th>
   <th width="200px">Voir le cv</th>
 </tr>
 @foreach ($cvs as $cv)
  <tr>
    <td>{{ $cv->etudiant->cne }}</td>
    <td>{{ $cv->etudiant->nom }}</td>
    <td>{{ $cv->etudiant->prenom }}</td>
    <td>{{ $cv->etudiant->dateDeNaissance }}</td>
    <td>  <a class="page-link" href="/getcv/{{ $cv->id }}" >voir le cv</a></td>
  </tr>
 @endforeach
 
</table>
{{-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> --}}
<script>
    // alert("Hello! I am an alert box!!");
    var experience = document.getElementById("experience");
    var experimental = document.getElementById("experimental");
    var formation = document.getElementById("formation");
    var loisir = document.getElementById("loisir");
    var competence = document.getElementById("competence");
    // experience.style.display = "none"
    // experimental.style.display = "none"
    // formation.style.display = "none"
    // loisir.style.display = "none"
    // competence.style.display = "none"
   const showExperience=()=> experience.style.display == "block" ? experience.style.display = "none" :  experience.style.display = "block"
   const showExperimental=()=>experimental.style.display == "block" ? experimental.style.display = "none" :  experimental.style.display = "block"
   const showFormation=()=>formation.style.display== "block" ? formation.style.display = "none" :  formation.style.display = "block"
   const showLoisir=()=>loisir.style.display == "block" ? loisir.style.display = "none" :  loisir.style.display = "block"
   const showCompetence=()=>competence.style.display == "block" ? competence.style.display = "none" :  competence.style.display = "block"

</script>

<!-- Modal -->






@endsection
