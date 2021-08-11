<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class NewsImage extends BaseModel
{
    use SoftDeletes, QueryCacheable;

    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    protected $table = 'news_image';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['news_image'])
     * @var string
     * @author 
    */
    public $cacheTags = ['news_image'];
    /**
     * equivalent of ->cachePrefix('news_image');
     * @var string
     * @author 
    */
    public $cachePrefix = 'news_image_';
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
     * Get the news that owns the image.
     */
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
