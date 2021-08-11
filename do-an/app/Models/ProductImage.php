<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class ProductImage extends BaseModel
{
    use SoftDeletes, QueryCacheable;

    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)

    protected $table = 'product_images';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['product_images'])
     * @var string
     * @author 
    */
    public $cacheTags = ['product_images'];
    /**
     * equivalent of ->cachePrefix('product_images');
     * @var string
     * @author 
    */
    public $cachePrefix = 'product_images_';
    
    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     * @author 
     */
    public $timestamps = false;

    /**
     * Get the product that owns the image.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
