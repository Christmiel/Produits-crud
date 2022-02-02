<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
   
    public function index()
    {
        $produits=Produit::latest()->paginate(5);
        return view('produits.index',compact('produits'))
        ->with('i',(request()->input('page',1)-1)*5);
    }


    public function create()
    {
        return view('produits.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nom'=>'required',
            'statut'=>'required',
        ]);
        Produit::create($request->all());
        return redirect()->route('produits.index')
        ->with('success','Produits created successfully.');
    }


    public function show(Produit $produit)
    {
        return view('produits.show',compact('produit'));
    }

   
    public function edit(Produit $produit)
    {
        return view('produits.edit',compact('produit'));

    }

    
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
             
        ]);
        $produit->update($request->all());

        return redirect()->route('produits.index')
        ->with('success','Produit update successfully');
    }

    
    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('produits.index')
        ->with('success','Produit delete successfully');
    }
}
