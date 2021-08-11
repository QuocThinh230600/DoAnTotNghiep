<?php

namespace App\Models;

use Illuminate\Support\Str;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Producer extends BaseModel implements TranslatableContract
{
    use SoftDeletes, Translatable, SoftCascadeTrait, QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'producers';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['producers'])
     * @var string
     * @author 
    */
    public $cacheTags = ['producers'];
    /**
     * equivalent of ->cachePrefix('producers');
     * @var string
     * @author 
    */
    public $cachePrefix = 'producers_';
    
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

    /**
     * The attributes soft delete with function name.
     * @var array
     * @author 
     */
    protected $softCascade = ['producer_translation'];

    /**
     * The attributes translate language.
     * @var array
     * @author 
     */
    public $translatedAttributes = ['name', 'address', 'phone', 'email', 'description', 'title_tag', 'meta_keywords', 'meta_description', 'meta_robots', 'meta_google_bot', 'locale', 'producer_id', 'slug'];

    /**
     * The auto generate uuid
     * @author 
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }

    /**
     * Relationship with translation
     * @return mixed
     * @author 
     */
    public function producer_translation()
    {
        return $this->hasMany(ProducerTranslation::class);
    }
}
