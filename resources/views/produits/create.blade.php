@extends('produits.layout')

@section('content')
<div class="col-lg-12 margin-tb btn btn-success">
        <div class="pull-right">
        <h2> Add a new Product</h2>  <br>
        </div>
 </div> <br><br><br>
   

@if($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach 
    </ul>
</div>
@endif


<form action="{{route('produits.store')}}" method="POST">
    @csrf

    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom du produit:</strong>
            <input type="text" name="nom" class="form-control" placeholder="nom">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Statut:</strong>

            <select name="statut" id="pet-select">
    <option value="">--Choisissez svp une option--</option>
    <option value="Indisponible">Disponible</option>
    <option value="Indisponible">Indisponible</option>
  
    </select>




        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection
