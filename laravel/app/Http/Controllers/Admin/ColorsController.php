<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Collection;
use App\Subcollection;
use App\Model;
use App\ModelItem;
use App\Color;
use App\ColorPhoto;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Collection $collection,Subcollection $subcollection)
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Collection $collection,Subcollection $subcollection)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(
        Request $request,
        Collection $collections,
        Subcollection $subcollections,
        Model $models,
        ModelItem $item
    ) {
        $color = new Color($request->all());
        $color->modelItem()->associate($item);
        if($color->save()) {
            if($request->hasFile('photo')) {
                $photo = new ColorPhoto([
                    'photo' => $request->file('photo')
                ]);
                $photo->color()->associate($color);
                $photo->save();
            }
            return redirect()->back()->withSuccess("Se ha guardado el nuevo color");
        } else {
            return redirect()->back()->withErrors($color->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
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
    public function update(
        Request $request,
        Collection $collections,
        Subcollection $subcollections,
        Model $models,
        ModelItem $item,
        Color $color
    ) {
        $color->fill($request->all());
        if($color->save()) {
            if($request->hasFile('photo')) {

                $photo = $color->photo ?: new ColorPhoto;
                $photo->fill([
                    'photo' => $request->file('photo')
                ]);
                $photo->color()->associate($color);
                $photo->save();
            }
            return redirect()->back()->withSuccess("Se ha actualizado color");
        } else {
            return redirect()->back()->withErrors($color->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(
        Request $request,
        Collection $collections,
        Subcollection $subcollections,
        Model $models,
        ModelItem $item,
        Color $color
    ) {
        $photo = $color->photo;
        if($photo) {
            $photo->delete();
        }
        if($color->delete()) {
            return redirect()->back()->withSuccess("Se ha eliminado el color");
        }
    }
}
