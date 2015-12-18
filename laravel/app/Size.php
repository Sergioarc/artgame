<?php

namespace App;

use Watson\Validating\ValidatingTrait;

class Size extends \Illuminate\Database\Eloquent\Model
{

    use ValidatingTrait;

    protected $rules = [
        'name' => 'required|alpha_num_spaces',
        'sku' => 'required|integer|between:1,99|unique_with:sizes,model_item_id'
    ];


	protected $fillable = ['sku','name','model_item_id'];

    public function modelItem(){
        return $this->belongsTo('App\ModelItem');
    }
}
