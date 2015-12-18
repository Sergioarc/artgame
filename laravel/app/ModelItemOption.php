<?php

namespace App;

use Watson\Validating\ValidatingTrait;

class ModelItemOption extends \Illuminate\Database\Eloquent\Model
{
  use ValidatingTrait;

  protected $fillable = ['kind', 'name', 'sku'];

  protected $rules = [
    'kind' => 'required|in:color,size',
    'name' => 'required|alpha_num_spaces',
    'sku' => 'required|integer|between:1,99'
  ];

  public function modelItem(){
    return $this->belongsTo('App\ModelItem');
  }

  public function setSkuAttribute($value){
    $this->attributes['sku'] = intval($value);
  }

  public function getSkuAttribute() {
    return sprintf("%02d", @$this->attributes['sku']);
  }
}
