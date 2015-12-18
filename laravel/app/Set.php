<?php

namespace App;

class Set extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['name', 'description'];

    public function photos()
    {
        return $this->hasMany('App\SetPhoto');
    }

    public function subcollection()
    {
        return $this->belongsTo('App\Subcollection');
    }

    public function modelItems()
    {
        return $this->belongsToMany('App\ModelItem');
    }
}
