<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends \Illuminate\Database\Eloquent\Model
{

    use SoftDeletes;
    
    protected $table = 'stock';
    protected $guarded = [];
    
    public function collection()
    {
        return $this->belongsTo('App\Collection');
    }

    public function subcollection()
    {
        return $this->belongsTo('App\Subcollection');
    }

    public function model()
    {
        return $this->belongsTo('App\Model');
    }

    public function modelItem()
    {
        return $this->belongsTo('App\ModelItem');
    }

    public function color()
    {
        return $this->belongsTo('App\Color', 'color_id');
    }

    public function size()
    {
        return $this->belongsTo('App\Size', 'size_id');
    }
}