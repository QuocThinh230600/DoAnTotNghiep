<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class CategoryTranslation extends BaseModel
{
    use SoftDeletes, QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'categories_translations';

    /**
     * equivalent of ->cacheTags(['categories_translations'])
     * @var string
     * @author 
    */
    public $cacheTags = ['categories_translations'];
    /**
     * equivalent of ->cachePrefix('categories_translations');
     * @var string
     * @author 
    */
    public $cachePrefix = 'categories_translations_';
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
     * The attributes that should be mutated to dates.
     * @var array
     * @author 
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The auto generate uuid
     * @author 
     */
    public static function boot ()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}
