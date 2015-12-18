<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Collection;
use App\Subcollection;
use App\Model;

class ModelsController extends Controller
{


    public function show(
        Collection $collection,
        Subcollection $subcollection,
        Model $model
    ) {
        return redirect()->action('Admin\ModelItemsController@index', [
            $collection->id,
            $subcollection->id,
            $model->id,
        ]);
    }

    public function store(
        Request $request,
        Collection $collection,
        Subcollection $subcollection
    ) {
        $model = new Model($request->all());
        $model->subcollection()->associate($subcollection);
        if($model->save()) {
            return redirect()->back()->withSuccess("Se ha guardado el nuevo modelo");
        }else {
            return redirect()->back()->withErrors($model->getErrors(), 'model_store');
        }
    }

    public function update(
        Request $request,
        Collection $collection,
        Subcollection $subcollection,
        Model $model
    ) {
        $model->fill($request->except('sku'));
        if($model->save()) {
            return redirect()->back()->withSuccess("Se ha actualizado el modelo {$model->name}");
        }else {
            return redirect()->back()->withErrors($model->getErrors(), 'model_store');
        }
    }

    public function destroy(
        Collection $collection,
        Subcollection $subcollection,
        Model $model
    ) {
        if($model->delete()) {
            return redirect()->back()->withSuccess("Se ha eliminado el modelo {$model->name}");
        }
    }
}