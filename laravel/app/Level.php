<?php

namespace App;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Illuminate\Database\Eloquent\Model;

class Level extends \Illuminate\Database\Eloquent\Model implements StaplerableInterface
{

    use EloquentTrait;

    

    protected $fillable = ['photo','user_id'];
    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('photo', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100',
                'mini' => '50x50'
            ]
        ]);

        parent::__construct($attributes);
    }

  
}
