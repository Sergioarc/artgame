<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use App\Http\Controllers\Controller;
use App\Collection;
use App\Subcollection;
use App\Color;
use App\Size;

use App\Model;
use App\ModelItem;


class ModelItemsController extends Controller 
{

    public function index(Collection $collection,Subcollection $subcollection,Model $model)
    {
        $modelItems = $model->modelItems()->with('colors', 'sizes')->get();
        return view('admin.model_items.index')->withModelItems($modelItems)
                                              ->withModel($model)
                                              ->withCollection($collection)
                                              ->withSubcollection($subcollection);
    }

    public function store(
        Request $request,
        Collection $collection,
        Subcollection $subcollection,
        Model $model
    ) {
        $item = new ModelItem($request->only([
            'name', 'sku'
        ]));

        $item->model()->associate($model);
        if($item->save()) {

            $colors = [
                'skus' => $request->input('color_skus', []),
                'names' => $request->input('color_names', []),
            ];

            $sizes = [
                'skus' => $request->input('size_skus', []),
                'names' => $request->input('size_names', []),
            ];

            $colorsWithError = [];
            foreach($colors['names'] as $i => $name) {
                if(!$name) continue;
                $sku = $colors['skus'][$i];
                $color = new Color([
                    'sku' => $sku,
                    'name' => $name,
                    'kind' => 'color'
                ]);
                $color->modelItem()->associate($item);
                if( ! $color->save() ) {
                    $colorsWithError[] = $color->getErrors();
                }
            }

            $sizesWithError = [];
            foreach($sizes['names'] as $i => $name) {
                if(!$name) continue;
                $sku = $sizes['skus'][$i];
                $size = new Size([
                    'sku' => $sku,
                    'name' => $name,
                    'kind' => 'size'
                ]);
                $size->modelItem()->associate($item);
                if( ! $size->save() ) {
                    $sizesWithError[] = $size->getErrors();
                }
            }
            return redirect()->back()->withSuccess("Se ha guardado la pieza {$item->name}")
                ->withSizesErrors($sizesWithError)
                ->withColorsErrors($colorsWithError);
        } else {
            return redirect()->back()->withErrors($item->getErrors(), 'item_store');
        }
    }

    public function update(
        Request $request,
        Collection $collection,
        Subcollection $subcollection,
        Model $model,
        ModelItem $item
    ) {

        \Log::debug('request', $request->all());

        $item->fill($request->only(['name']));

        if($item->save()) {

            $colors = [
                'skus' => $request->input('color_skus', []),
                'names' => $request->input('color_names', []),
                'old_skus' => $item->colors()->lists('sku')->all(),
            ];

            $sizes = [
                'skus' => $request->input('size_skus', []),
                'names' => $request->input('size_names', []),
                'old_skus' => $item->sizes()->lists('sku')->all(),
            ];

            $colorsWithError = [];
            foreach($colors['names'] as $i => $name) {
                if(!$name) continue;
                $sku = $colors['skus'][$i];
                $color = Color::firstOrnew([
                    'sku' => intval($sku),
                    
                ]);
                $color->fill([
                    'name' => $name,
                ]);
                
                $color->modelItem()->associate($item);
                if( ! $color->save() ) {
                    unset($colors['skus'][$i]);
                    $colorsWithError[] = $color->getErrors();
                }
            }

            $sizesWithError = [];
            foreach($sizes['names'] as $i => $name) {
                if(!$name) continue;
                $sku = $sizes['skus'][$i];
                $size = Size::firstOrnew([
                    'sku' => intval($sku),
                    
                ]);
                $size->fill([
                    'name' => $name,
                ]);
                $size->modelItem()->associate($item);
                if( ! $size->save() ) {
                    unset($sizes['skus'][$i]);
                    $sizesWithError[] = $size->getErrors();
                }
            }

            $colorsToDelete = array_diff($colors['old_skus'], $colors['skus']);
            $sizesToDelete = array_diff($sizes['old_skus'], $sizes['skus']);
            \Log::info("COLORS OLD", $colors['old_skus']);
            \Log::info("COLORS", $colors['skus']);


            \Log::info("COLORS TO DELETE", $colorsToDelete);

            Color::whereIn('sku', $colorsToDelete)->delete();
            Size::whereIn('sku', $sizesToDelete)->delete();


            return redirect()->back()->withSuccess("Se ha actualizado la pieza {$item->name}")
                ->withSizesErrors($sizesWithError)
                ->withColorsErrors($colorsWithError);
        } else {
            return redirect()->back()->withErrors($item->getErrors(), 'item_update');
        }
    }

    public function destroy(
        Collection $collection,
        Subcollection $subcollection,
        Model $model,
        ModelItem $item
    ) {
        if($item->delete()) {
            return redirect()->back()->withSuccess("Se ha eliminado la pieza {$item->name}");
        }
    }
}