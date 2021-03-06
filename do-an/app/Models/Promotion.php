<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Promotion extends Model
{
    use QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    protected $table = 'promotions';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     * @author Quoc Tuan
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['bonus_product'])
     * @var string
     * @author 
    */
    public $cacheTags = ['promotions'];
    /**
     * equivalent of ->cachePrefix('bonus_product');
     * @var string
     * @author 
    */
    public $cachePrefix = 'promotions_';
    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     * @author Quoc Tuan
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The auto generate uuid
     *
     * @author Quoc Tuan
     */
    public static function boot ()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}
