@extends('produits.layout')
@section('content')
<div class="col-lg-12 margin-tb btn btn-primary">
        <div class="pull-right">
        <h2> Edit Products</h2>  <br>
        </div>
 </div> <br><br><br>
   

@if($errors->any())
<div class="alert alert-danger">
    <strong> Whooops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach</ul>
</div>
@endif
<form action="{{route('produits.update',$produit->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class=" col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

            <strong>Nom:</strong>

            <input type="text" name="nom" value="{{$produit->nom}}"
            class="form-control" placeholder="Nom">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">

    <strong>Statut:</strong>

            <input type="text" name="statut" value="{{$produit->statut}}"
            class="form-control" placeholder="Statut">
            </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection


