<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Collection;
use App\Subcollection;
use App\Model;
use App\ModelItem;
use App\Size;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
        $size = new Size($request->all());
        $size->modelItem()->associate($item);
        if($size->save()) {
            return redirect()->back()->withSuccess("Se ha guardado la nueva talla");
        } else {
            return redirect()->back()->withErrors($size->getErrors());
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
        Size $size
    ) {
        $size->fill($request->all());
        $size->modelItem()->associate($item);
        if($size->save()) {
            return redirect()->back()->withSuccess("Se ha actualizado la talla");
        } else {
            return redirect()->back()->withErrors($size->getErrors());
        }
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
