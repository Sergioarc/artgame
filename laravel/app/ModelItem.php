<?php

namespace App;

use Watson\Validating\ValidatingTrait;

class ModelItem extends \Illuminate\Database\Eloquent\Model
{
  use ValidatingTrait;

  protected $fillable = ['name', 'sku'];

  protected $rules= [
    'name' => 'required|alpha_num_spaces',
    'sku' => 'required|size:3|unique_with:model_items,model_id'

  ];

  public function model(){
    return $this->belongsTo('App\Model');
  }

  // public function suppliers()
  // {
  //   return $this->belongsToMany('Supplier', 'items_suppliers');
  // }


  public function sizes(){
    return $this->hasMany('App\Size');
  }

  public function colors(){
    return $this->hasMany('App\Color');
  }

  public function sets()
  {
    return $this->belongsToMany('App\Set');
  }

  public function stock() {
    return $this->hasMany('App\Stock');
  }

  // TMP
  public function getPriceAttribute()
  {
    \Log::info('here');
    return 100;
  }
}
