<?php

namespace App;

use Watson\Validating\ValidatingTrait;

class Collection extends \Illuminate\Database\Eloquent\Model
{
  use ValidatingTrait;

  protected $fillable = ['name', 'sku'];

  protected $rules = [
    'name' => 'required|alpha_num_spaces',
    'sku' => 'required|unique:collections,sku|integer|between:1,99'
  ];

  public function subcollections(){
    return $this->hasMany('App\Subcollection');
  }

  public function stock()
  {
    return $this->hasMany('App\Stock');
  }


  public function setSkuAttribute($value){
    $this->attributes['sku'] = intval($value);
  }

  public function getSkuAttribute() {
    return @$this->attributes['sku'] ? sprintf("%02d", $this->attributes['sku']) : null;
  }
}
