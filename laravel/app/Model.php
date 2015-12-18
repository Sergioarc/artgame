<?php

namespace App;

use Watson\Validating\ValidatingTrait;

class Model extends \Illuminate\Database\Eloquent\Model
{
  use ValidatingTrait;

  protected $fillable = ['sku', 'name'];

  protected $rules = [
    'name' => 'required|alpha_num_spaces',
    'sku' => 'required|integer|between:1,99|unique_with:models,subcollection_id'

  ];

  public function subcollection(){
    return $this->belongsTo('App\Subcollection');
  }

  public function modelItems(){
    return $this->hasMany('App\ModelItem');
  }

  public function stock()
  {
    $query = DB::table('model_items')->select('model_items_stock.*')
    ->leftJoin('model_items_stock', 'model_items_stock.model_item_id', '=', 'model_items.id')
    ->whereNotNull('model_items_stock.id')
    ->where('model_items.model_id', $this->id);

    return $query;
  }

  public function setSkuAttribute($value){
    $this->attributes['sku'] = intval($value);
  }
}
