<?php

namespace App;

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Level extends \Illuminate\Database\Eloquent\Model implements StaplerableInterface
{

    use EloquentTrait;

    

    protected $fillable = ['photo'];
    public function __construct(array $attributes = array())
    {
        $this->hasAttachedFile('photo', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);

        parent::__construct($attributes);
    }

  
}
