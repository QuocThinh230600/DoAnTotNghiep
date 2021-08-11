<?php

namespace App\Models;

use Rennokki\QueryCache\Traits\QueryCacheable;

class Config extends BaseModel
{
    use QueryCacheable;
  
    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
      /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'configs';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['configs'])
     * @var string
     * @author 
    */
    public $cacheTags = ['configs'];
    /**
     * equivalent of ->cachePrefix('configs');
     * @var string
     * @author 
    */
    public $cachePrefix = 'configs_';
    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    /**
     * The attributes that should be mutated to dates.
     * @var array
     * @author 
     */
    protected $dates = ['created_at', 'updated_at'];
}
