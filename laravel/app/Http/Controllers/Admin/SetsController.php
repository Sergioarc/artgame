<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Collection;
use App\Subcollection;
use App\Model;
use App\ModelItem;
use App\Set;
use App\SetPhoto;

class SetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(
        Collection $collection,
        Subcollection $subcollection
    ){
        return view('admin.sets.index', [
            'collection'    => $collection,
            'subcollection' => $subcollection,
            'sets' => $subcollection->sets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(
        Collection $collection,
        Subcollection $subcollection
    ){
        return view('admin.sets.create', [
            'collection'    => $collection,
            'subcollection' => $subcollection,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(
        Collection $collection,
        Subcollection $subcollection,
        Request $request)
    {
        \Log::info('request', $request->all());
        $set = new Set($request->only(['name', 'description']));
        $set->subcollection()->associate($subcollection);
        if($set->save()){
            foreach($request->file('photos', []) as $photo) {
                \Log::info('here');
                $set_photo = new SetPhoto(['photo' => $photo]);
                $set_photo->set()->associate($set);
                $set_photo->save();
            }

            foreach($request->input('model_items', []) as $item) {
                $set->modelItems()->attach($item);
            }

            return redirect(action('Admin\SetsController@index', [$collection->id, $subcollection->id]))
                ->withSuccess("Se ha guardado el conjunto");
        }else{
            return redirect()->back()->withErrors($set->getErrors(), 'set');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Set $set)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}