<?php

namespace App;

class Order extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['session_id', 'user_id','status'];
    protected $appends = ['estado'];

    public function stock()
    {
        return $this->hasMany('App\Stock');
    }

    public function getFormattedIdAttribute()
    {
        return str_pad($this->id, 8, '0', STR_PAD_LEFT);
    }

    public function getEstadoAttribute()
    {
    	switch ($this->status) {

    		case 'cart':
    			return 'CARRO';
    			break;
    		case 'order':
    			return 'ORDEN';
    			break;
    		case 'in_transit':
    			return 'ENVIADO';
    			break;
    		case 'done':
    			return 'ENTREGADO';
    			break;
    		case 'cancelled':
    			return 'CANCELADO';
    			break;

    		default:
    			return 'N/A';
    			break;
    	}
    }
}
