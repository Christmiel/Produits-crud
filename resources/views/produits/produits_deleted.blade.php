@extends('produits.layout')

@section('content')

<div class="col-lg-12 margin-tb btn btn-warning">
        <div class="pull-right">
        <h2> Produits deleted</h2>  <br>
        </div>
 </div> <br><br><br>
   

<div class="row">
    <div class="col-lg-12 margin-tb">
       

      

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
                <td>{{++$i}}</td>
                <td>{{$produit->nom}}</td>
                <td>{{$produit->statut}}</td>
                <td>
                    <a class=" btn btn-success" href="{{url('produits/restore').'/'.$produit->id }}">Restore </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>