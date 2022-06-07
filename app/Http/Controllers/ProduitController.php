<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
   
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index')->with('produits',$produits);
            //$data['Lists'] = produit::withoutTrashed()->pagination(4);
           // return view('produits', $data);
        // $produits=Produit::latest()->paginate(5);
        // return view('produits.index',compact('produits'))
        // ->with('i',(request()->input('page',1)-1)*5);
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

   /**
    * @param Produit $produit
    */
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

    
    public function destroy(Request $request, $id)
    {
        Produit::findOrFail($id)->delete();
        // $produit->delete();

        return redirect()->route('produits.index')
        ->with('success','Produit delete successfully');
    }

    public function index_deleted() 
    {
        $produits = Produit::withTrashed()
            ->where('deleted_at','!=',NULL)->get();
            
        return view('produits.produits_deleted')->with('produits',$produits);
    }

    public function restore(Request $request, $id)
    {   
        $produit = Produit::withTrashed()
        ->where('id',$id)->first();
        $produit->restore();

        return redirect()->route('produits.index')
        ->with('success','Produit restored successfully');
    } 

    public function hardDeleted(Request $request, $id)
    {
        $produit = Produit::where('id', $id)->first();
        $produit->forceDelete();
        return redirect()->route('produits.index')
        ->with('success','Produit deleted successfully');

    }
}
