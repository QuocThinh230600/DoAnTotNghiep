<?php

namespace App\Models;

use App\Models\ProducerImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class ProducerImage extends Model
{
    use SoftDeletes, QueryCacheable;

    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)

    protected $table = 'producer_images';

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
    public $cacheTags = ['producer_images'];
    /**
     * equivalent of ->cachePrefix('product_images');
     * @var string
     * @author 
    */
    public $cachePrefix = 'producer_images_';
    
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

    public function producer_images()
    {
        return $this->hasMany(ProducerImage::class);
    }
    
}
