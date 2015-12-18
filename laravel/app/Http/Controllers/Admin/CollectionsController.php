<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Collection;

class CollectionsController extends Controller
{

    public function index()
    {
        $collections = Collection::with('subcollections')->paginate(20);
        return view('admin.collections.index', [
            'collections' => $collections
        ]);
    }

    public function store(Request $request)
    {
        $collection = Collection::create($request->all());
        if ( $collection->exists ) {
            return redirect()->back()->withSuccess("La nueva colección {$collection->name} se ha añadido");
        }else {
            return redirect()->back()->withErrors($collection->getErrors(), 'collection_store');
        }
    }

    public function update(Request $request, Collection $collection)
    {
        $collection->fill($request->except(['sku']));
        if( $collection->save() ) {
            return redirect()->back()->withSuccess("La colección {$collection->name} se ha actualizado");
        }else {
            return redirect()->back()->withErrors($collection->getErrors(), 'collection_update');
        }
    }

    public function destroy(Collection $collection)
    {
        if($collection->delete()){
            return redirect()->back()->withSuccess("La colección {$collection->name} se ha eliminado");
        }
    }
}