<?php

namespace App;

use Watson\Validating\ValidatingTrait;

class Subcollection extends \Illuminate\Database\Eloquent\Model
{
  use ValidatingTrait;

  protected $fillable = ['sku', 'name'];

  protected $rules = [
    'name' => 'required|alpha_num_spaces',
    'sku' => 'required|integer|between:1,99|unique_with:subcollections,collection_id'

  ];

  public function collection(){
    return $this->belongsTo('App\Collection');
  }

  public function models(){
    return $this->hasMany('App\Model');
  }

  public function sets()
  {
    return $this->hasMany('App\Set');
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
