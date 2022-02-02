@extends('produits.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Add new produit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{route('produits.index')}}"> Back</a>
        </div>
    </div> 
</div> 

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
            <strong>ProduitName:</strong>
            <input type="text" name="nom" class="form-control" placeholder="nom">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Statut:</strong>
            <input type="text" name="statut" class="form-control" placeholder="statut">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
@endsection
