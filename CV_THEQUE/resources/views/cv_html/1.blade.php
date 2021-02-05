<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="generator" content="pdf2htmlEX"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <style type="text/css">
        .side{
            z-index: 10;
            position: absolute;
            left:0;
            top:0;
            background: #0071C1;
            width: 210px;
            height: 100%;
            color: white;
        }
        .front{
            z-index: 11;
            position: absolute;
            background: #BFBFBF;
            width: 670px;
            height: 100px;
            text-align: right;
            left:0;
            top:70px;
        }
        .name{
            font-size: 40px;
            margin: 20px;
            font-family: "Segoe UI", serif;
            margin-right: 80px;
            color: white;
        }
        .profile_image{
            z-index: 12;
            position: absolute;
            top: 30px;
            left: 10px;
        }
        .content{
            position: absolute;
            top: 170px;
            left: 210px;
            height: 590px;
            width: 460px;
        }
        .fr{
            margin-left: 50px;
            color: black;
        }
        .titre{
            font-size: 20px;
            font-family: "Segoe UI", serif;
        }
        .an{
            margin-top: 7px;
            width: 35%;
            height: 93%;
            font-size: 20px;
            font-family: "Segoe UI", serif;
        }
        .inf{
            display: inline-flex;
            width: 100%;
            height: 39%;
        }
        .fr-inf{
            font-size: 15px;
            margin-left: 10px;
            width: 60%;
            height: 80%;
        }
        .info{
            color: white;
            font-size: 15px;
            font-family: "Segoe UI", serif;
            margin-top: 250px;
            margin-left: 10px;
        }
        .si{
            margin-left: 10px;
        }
    </style>

    <title>{{$ident->prenom}} {{$ident->nom}}</title>
</head>
<body>

<div class="container">
    <div class="profile_image">
        <img src="/storage/user_image/{{$ident->id}}.jpeg" style="height: 200px;width: 180px" />
    </div>
    <div class="side">
        <div class="info">
            {{$ident->adresse}}<br>{{$ident->email}}<br>{{$ident->CodePostale}}  {{$ident->ville}}<br>{{$ident->telephone}}<br>{{$ident->DateDeNaissance}}<br>{{$ident->StatuMarital}}<br>{{$ident->PermisDeConduit}}
        </div>

        <h5 class="si titre">Logicial</h5>
        <p>{{$competence->logiciel}}</p>
        <h5 class="si titre">Langues</h5>
        <p>{{$competence->langues}}</p>
        <h5 class="si titre">Projets</h5>
        <p>{{$competence->ProjetRealiser}}</p>


    </div>
    <div class="front"><div class="name">{{$ident->prenom}}  {{$ident->nom}}</div></div>
    <div class="content">
        <h5 class="fr titre">Formations</h5>
        <div class="inf">
            <p class="an fr">@foreach($formation as $f) {{$f->DateDebutDeFormation}}   {{$f->DateFinFormation}}<br> @endforeach</p>
            <p class="fr-inf">@foreach($formation as $f) {{$f->Formation}}<br>{{$f->LieuFormation}}<br> @endforeach</p>
        </div>
        <h5 class="fr titre">Experiences</h5>
        <div class="inf">
            <p class="an fr">@foreach($experimental as $ex) {{$ex->DateDebut}}   {{$ex->DateFin}}<br> @endforeach</p>
            <p class="fr-inf">@foreach($experimental as $ex) {{$ex->Societe}}   {{$ex->Mission}}<br> @endforeach</p>
        </div>
    </div>
</div>



</body>
</html>
