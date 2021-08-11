<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class CategoryNews extends BaseModel
{
    use SoftDeletes,QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'category_news';

    /**
     * equivalent of ->cacheTags(['category_news'])
     * @var string
     * @author 
    */
    public $cacheTags = ['category_news'];
    /**
     * equivalent of ->cachePrefix('category_news');
     * @var string
     * @author 
    */
    public $cachePrefix = 'category_news_';
    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     * @author 
     */
    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     * @var array
     * @author 
     */
    protected $dates = ['deleted_at'];
}
