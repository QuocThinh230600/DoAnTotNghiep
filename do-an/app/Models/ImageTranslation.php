<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class ImageTranslation extends BaseModel
{
    use SoftDeletes, QueryCacheable;

    /**
     * The table associated with the model.
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    protected $table = 'images_translations';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['images_translations'])
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
    */
    public $cacheTags = ['images_translations'];
    /**
     * equivalent of ->cachePrefix('images_translations');
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
    */
    public $cachePrefix = 'images_translations_';
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
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The auto generate uuid
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public static function boot ()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}