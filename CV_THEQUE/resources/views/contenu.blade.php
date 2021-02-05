@extends('layouts.app')

@section('content')



    <div class="container">

        <div class="container">


            <div class="card shadow-lg">
                <ul class="tabs">
                    <li >
                        <a  id="step_1_link" class="no-cursor" data-next-step="1" data-href="/ident" href="/ident" title="Identification" >
                            <i class="rnd-20">
                                <span><i class="fa fa-check"></i></span>
                            </i>
                            <br> Identification
                        </a>
                        <i class="overlay"></i>
                    </li>
                    <li class="mdl active">
                        <a id="step_2_link" class="steplink" data-next-step="2" data-href="/contenu" href="/" title="Contenu"onclick="return false;">
                            <i class="rnd-20">
                                <span><i class="fa fa-check"></i></span>
                            </i>
                            <br> Contenu
                        </a>
                        <i class="overlay"></i>
                    </li>
                    <li class="last ">
                        <a id="step_3_link" class="steplink" data-next-step="3" data-href="/export" href="/" title="Export" >
                            <i class="rnd-20"><span>3</span></i>
                            <br> Export</a>
                        <i class="overlay"></i>
                    </li>
                </ul>
                <div class="card">
                    <h2 class="card-header ">
                        <a class="collapsed d-block" data-toggle="collapse" href="#collapse-collapsed" style="text-decoration: none" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <i class="fa fa-chevron-down pull-right"></i>
                            Formations
                        </a>
                    </h2>
                    <div id="collapse-collapsed" class="collapse" aria-labelledby="heading-collapsed">
                        <div class="card-body bg-light">
                            <form method="post" action="/contenus">
                                {{csrf_field()}}
                                <div class="container">

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Date Debut</th>
                                            <th>Date Fin</th>
                                            <th>Formation</th>
                                            <th>Etablisement</th>

                                            <th><a href="#" id="addRow"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="date" name="DateDebutDeFormation[]" class="form-control" required=""></td>
                                            <td><input type="date" name="DateFinFormation[]" class="form-control" required=""></td>
                                            <td><input type="text" name="Formation[]" class="form-control" required=""></td>
                                            <td><input type="text" name="LieuFormation[]" class="form-control" required=""></td>
                                            <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>
                                        </tr>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td style="border: none"></td>
                                            <td style="border: none"></td>
                                            <td style="border: none"></td>
                                            <td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <script type="text/javascript">

                                    $(document).ready(function() {
                                        $('#addRow').on('click',function(){
                                            addRow();
                                        });
                                        function addRow()
                                        {

                                            var tr='<tr>'+
                                                '<td><input type="date" name="DateDebutDeFormation[]" class="form-control" required=""></td>'+
                                                '<td><input type="date" name="DateFinDeFormation[]" class="form-control"required=""></td>'+
                                                '<td><input type="text" name="Formation[]" class="form-control"required=""></td>'+
                                                '<td><input type="text" name="LieuFormation[]" class="form-control" required=""></td>'+
                                                '<td><a href="/contenu" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                                                '</tr>';
                                            $('tbody').append(tr);
                                        };  });
                                    $(document).ready(function() {
                                        $('.remove').live('click',function(){
                                            var last=$('tbody tr').length;
                                            if(last==1){
                                                alert("you can not remove last row");
                                            }
                                            else{
                                                $(this).parent().parent().remove();
                                            }

                                        });
                                    });


                                </script>
                            </form>
                </div>


            </div>
                    <div class="card">
                        <h2 class="card-header ">
                            <a class="collapsed d-block" data-toggle="collapse" href="#collapse-collapsed1" style="text-decoration: none" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed1">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <i class="fa fa-chevron-down pull-right"></i>
                                Expériences professionnelles
                            </a>
                        </h2>
                        <div id="collapse-collapsed1" class="collapse" aria-labelledby="heading-collapsed">
                            <div class="card-body bg-light">
                                <form method="post" action="/contenu">
                                    {{csrf_field()}}
                                    <div class="container">
                                        <a  id="btn_delete"><i class="fa fa-times" aria-hidden="true" style="text-decoration: none"> </i>

                                        </a>
                                        <br>
                                        <div class="row" id="a_clone1" >
                                            <div class="col-md-6" id="a_clone1">
                                                <div class="form-group" id="a_clone1">
                                                    <label  id="a_clone1" for="Societe">Societe:</label>
                                                    <input id="a_clone1" type="text" class="form-control" name="Societe" placeholder="Entrez le non de sociate " >

                                                </div>
                                                <div class="form-group" id="a_clone1">
                                                    <label  id="a_clone" for="DateDebut">Date Debut :</label>
                                                    <input  id="a_clone" type="date" class="form-control" name="DateDebut" placeholder="Entrez la Date Debut " >
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="a_clone1">
                                                <div class="form-group " id="a_clone1">
                                                    <label id="a_clone1" for="Duree">Duree:</label>
                                                    <input id="a_clone1" type="number" class="form-control" name="Duree" placeholder="Entrez la duree" >

                                                </div>
                                                <div id="a_clone1" class="form-group">
                                                    <label id="a_clone1" for="DateFin">Date Fin :</label>
                                                    <input  id="a_clone1" type="date" class="form-control" name="DateFin" placeholder="Entrez la Date Fin " >
                                                </div>
                                            </div>
                                            <div id="a_clone1" class="col-md-12">
                                                <div id="a_clone1"class="form-group">
                                                    <label for="Mission">Mission</label>
                                                    <textarea id="a_clone1"  class="form-control" name="Mission" placeholder="Entrez votre mission" rows="8" cols="80">
                                            </textarea>

                                                </div>
                                                <input type="submit" name="" value="Submit" class="btn btn-success">
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <script type="text/javascript">
                                    tinymce.init({
                                        selector: 'textarea',
                                        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                                        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                                        toolbar_mode: 'floating',
                                        tinycomments_mode: 'embedded',
                                        tinycomments_author: 'Author name',
                                    });
                                </script>
                            </div>
                        </div>
                        <h2 class="card-header ">
                            <a class="collapsed d-block" data-toggle="collapse" href="#collapse-collapsed2" style="text-decoration: none" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed2">
                                <i class="fa fa-language" aria-hidden="true"></i>
                                <i class="fa fa-chevron-down pull-right"></i>
                                Competence
                            </a>
                        </h2>
                        <div id="collapse-collapsed2" class="collapse" aria-labelledby="heading-collapsed">
                            <div class="card-body bg-light">
                                <form method="post" action="{{route('contenu')}}">
                                    {{csrf_field()}}
                                    <div class="container">
                                        <a  id="btn_delete"><i class="fa fa-times" aria-hidden="true" style="text-decoration: none"> </i>
                                            <i  aria-hidden="true"></i>
                                        </a>
                                        <br>
                                        <div class="row" id="a_clone1" >


                                            <div id="a_clone1" class="col-md-6">
                                                <div id="a_clone1"class="form-group">
                                                    <label for="langues">Langues</label>
                                                    <textarea id="a_clone1"  class="form-control" name="langues" placeholder="langues" rows="4" cols="80">
                                            </textarea>

                                                </div>
                                            </div>
                                                <div id="a_clone1" class="col-md-6">
                                                    <div id="a_clone1"class="form-group">
                                                        <label for="logiciel">logiciel</label>
                                                        <textarea id="a_clone1"  class="form-control" name="logiciel" placeholder="logiciel" rows="4" cols="80">
                                            </textarea>

                                                    </div>
                                                </div>
                                                    <div id="a_clone1" class="col-md-12">
                                                        <div id="a_clone1"class="form-group">
                                                            <label for="ProjetRealiser">Projet Realiser</label>
                                                            <textarea id="a_clone1"  class="form-control" name="ProjetRealiser" placeholder=" Projet Realiser" rows="4" cols="80">
                                            </textarea>

                                                        </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div id="b_clone1"  ></div>
                                    <br>

                            </div>

                            </form>
                        </div>
                        <script>

                            tinymce.init({
                                selector: 'textarea',
                                plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                                toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                                toolbar_mode: 'floating',
                                tinycomments_mode: 'embedded',
                                tinycomments_author: 'Author name',
                            });

                        </script>
                    </div>
                </div>
                <h2 class="card-header ">
                    <a class="collapsed d-block" data-toggle="collapse" href="#collapse-collapsed3" style="text-decoration: none" aria-expanded="true" aria-controls="collapse-collapsed" id="heading-collapsed3">
                        <i  class="fa fa-book" aria-hidden="true"></i>
                        <i class="fa fa-chevron-down pull-right"></i>
                        Loisir
                    </a>
                </h2>
                <div id="collapse-collapsed3" class="collapse" aria-labelledby="heading-collapsed">
                    <div class="card-body bg-light">
                        <form method="post" action="{{route('contenu')}}">
                            {{csrf_field()}}
                            <div class="container">

                                <div class="row" id="a_clone1" >



                                    <div id="a_clone1" class="col-md-12">
                                        <div id="a_clone1"class="form-group">
                                            <label for="centre_d_interet">Centre d'interet</label>
                                            <textarea id="a_clone1"  class="form-control" name="centre_d_interet" placeholder=" centre d'interet" rows="4" cols="80">
                                            </textarea>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div id="b_clone1"  ></div>
                            <br>

                    </div>

                    </form>
                </div>
                <script>

                    tinymce.init({
                        selector: 'textarea',
                        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                        toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
                        toolbar_mode: 'floating',
                        tinycomments_mode: 'embedded',
                        tinycomments_author: 'Author name',
                    });

                </script>
            </div>
        </div>
            <div class="mt-3" style="text-align: center;">
                <input type="submit" class="btn-blue-fill btn-next-step" style="width: 50%" value="Étape suivante">
            </div>

        </div>
    </div>

@endsection
