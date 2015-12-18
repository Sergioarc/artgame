<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Collection;
use App\Subcollection;

class SubcollectionsController extends Controller
{

    public function index(Collection $collection)
    {
        $subcollections = $collection->subcollections()->with('models');
        return view('admin.subcollections.index', [
            'subcollections' => $subcollections->paginate(10)
        ]);
    }

    public function show(Collection $collection, Subcollection $subcollection)
    {
        $models = $subcollection->models()->with('modelItems');
        return view('admin.subcollections.show', [
            'collection' => $collection,
            'subcollection' => $subcollection,
            'models' => $models->paginate(10)
        ]);
    }

    public function store(Request $request, Collection $collection)
    {
        $subcollection = new Subcollection($request->all());
        $subcollection->collection()->associate($collection);
        if($subcollection->save()){
            return redirect()->back()->withSuccess("Se ha creado la nueva subcolección {$subcollection->name}");
        }else{
            return redirect()->back()->withErrors($subcollection->getErrors(), 'subcollection_store');
        }
    }

    public function update(Request $request, Collection $collection, Subcollection $subcollection)
    {
        $subcollection->fill($request->except(['sku']));
        if($subcollection->save()){
            return redirect()->back()->withSuccess("Se ha actualizado la subcolección {$subcollection->name}");
        }else{
            return redirect()->back()->withErrors($subcollection->getErrors(), 'subcollection_update');
        }
    }

    public function destroy(Collection $collection, Subcollection $subcollection)
    {
        if($subcollection->delete()){
            return redirect()->back()->withSuccess("Se ha eliminado la subcolección {$subcollection->name}");
        }
    }
}