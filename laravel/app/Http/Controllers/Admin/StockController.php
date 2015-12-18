<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;

use App\Http\Controllers\Controller;
use App\Collection;
use App\ModelItem;
use App\Color;
use App\Size;
use App\Stock;

class StockController extends Controller
{

    public function index()
    {
        $query = Stock::with('collection', 'subcollection', 'model', 'modelItem', 'color', 'size')
            ->groupBy('model_item_id', 'color_id', 'size_id')
            ->select('stock.*', DB::raw('count(*) as in_stock'));
        // $stock = DB::table(DB::raw("(".$query->toSql() . ") c" ) )->select('c.*')->paginate(15);
        $stock = $query->get();
        return view('admin.stock.index')->withStock($stock)->withCollections(Collection::orderBy('name')->lists('name', 'id')->all());
    }

    public function store(Request $request)
    {
        $item = ModelItem::with(
            'model',
            'model.subcollection',
            'model.subcollection.collection'
        )->find($request->input('model_item'));
        $color = null;
        $size = null;
        if ($request->has('color')) {
            $color = Color::find($request->input('color'));
        }
        if ($request->has('size')) {
            $size = Size::find($request->input('size'));
        }
        if (
            is_null($item)
            or is_null($item->model)
            or is_null($item->model->subcollection)
            or is_null($item->model->subcollection->collection)
            or ($request->has('color') and is_null($color))
            or ($request->has('size') and is_null($size))
        ) {
            abort(404);
        }

        $stock = new Stock;
        $stock->collection()->associate($item->model->subcollection->collection);
        $stock->subcollection()->associate($item->model->subcollection);
        $stock->model()->associate($item->model);
        $stock->modelItem()->associate($item);
        $stock->color()->associate($color);
        $stock->size()->associate($size);
        $saved = $stock->save() ? 1 : 0;
        for ($i=0; $i < $request->input('number', 1) - 1; $i++) { 
            $stock = $stock->replicate();
            if($stock->save()){
                $saved++;
            }
        }
        return redirect()->back()->withSuccess("Se añadieron $saved piezas al inventario");

    }
}