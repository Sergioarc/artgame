<?php

namespace App;

use Watson\Validating\ValidatingTrait;

class Color extends \Illuminate\Database\Eloquent\Model
{
    use ValidatingTrait;

    protected $rules = [
        'name' => 'required|alpha_num_spaces',
        'sku' => 'required|integer|between:1,99|unique_with:colors,model_item_id'
    ];
	protected $fillable = ['sku','name'];
	
	public function photo()
	{
		return $this->hasOne('App\ColorPhoto');
	}

	public function modelItem(){
        return $this->belongsTo('App\ModelItem');
    }

}
