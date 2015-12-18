<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Collection;
use App\Subcollection;
use App\Model;
use App\ModelItem;
use App\ModelItemOption;

class ApiController extends Controller 
{

    public function getModelItemOptions(ModelItem $items) {
        $items->load('colors', 'sizes');
        return response()->json([
            'status' => 200,
            'item' => $items,
        ]);
    }

    public function getCollections()
    {
        return response()->json(Collection::all());
    }

    public function getSubcollections(Collection $collection)
    {
        return response()->json($collection->subcollections);
    }

    public function getModels(Subcollection $subcollection)
    {
        return response()->json($subcollection->models);
    }

    public function getModelItems(Model $model)
    {
        return response()->json($model->modelItems);
    }

    public function getModelItemColors(ModelItem $item)
    {
        return response()->json($item->colors);
    }

    public function getModelItemSizes(ModelItem $item)
    {
        return response()->json($item->sizes);
    }
}