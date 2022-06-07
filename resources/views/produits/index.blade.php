@extends('produits.layout')

@section('content')


<div class="col-lg-12 margin-tb btn btn-success">
        <div class="pull-right">
        <h2> Produits crud</h2>  <br>
        </div>
 </div> <br><br><br>
   


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <center>
            <a class="btn btn-success mr-5" href="{{route('produits.create')}}"> Create New Produit</a> 
            <a class="btn btn-warning" href="{{url('produits/deleted')}}"> Products deleted</a>
            </center>  <br>
        </div>


        </div>
        <center>
        @if($message=Session::get('success'))
        <div class="alert alert-success"))>
            <p>{{$message}}</p>
        </div>
       @endif
        </center>

       <table class="table table-bordered">
           <tr>
               <th> No</th>
               <th>Nom</th>
               <th>Statut</th>
               <th width="280px">Action</th>
            </tr>
            @php
                $i = 0;
            @endphp
             @foreach($produits as $produit)
            <tr>
                <td class = "mr-2">{{++$i}}</td>
                <td>{{$produit->nom}}</td>
                <td>{{$produit->statut}}</td>
                <td>
                     <a class=" btn btn-primary" href="{{route('produits.edit',$produit->id) }}">Edit </a>

                    <form action="{{route('produits.destroy',$produit->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">SoftDelete</button>
                    </form>

                    <form action="{{url('produits/hard_deleted',['id' => $produit->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                  
                        <button type="submit" class="btn btn-danger">HardDelete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>