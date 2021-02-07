@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Students Management</h2>
        </div>
        <div class="pull-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"> Create New Recruteur</button>

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
   <th>No</th>
   <th>Nom</th>
   <th>Email</th>
   <th width="200px">Action</th>
 </tr>
 @foreach ($users as $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->user->name }}</td>
    <td>{{ $user->user->email }}</td>
    <td>
       <a class="btn btn-primary" href="{{ route('admin.recruteurs.edit',$user->id) }}">Editer</a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.recruteurs.destroy', $user->user_id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>
<!-- Modal -->
<div class="modal fade bg-dark" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Un recruteur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

{!! Form::open(array('route' => 'admin.recruteurs.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom:</strong>
            {!! Form::text('nom', null, array('placeholder' => 'nom','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'mot de passe','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
</div>
{!! Form::close() !!}



<p class="text-center text-primary"><small>CVTHEQUE</small></p>
@endsection
