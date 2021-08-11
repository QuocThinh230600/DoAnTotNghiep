<?php

namespace App\Models;

use Illuminate\Support\Str;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Image extends BaseModel implements TranslatableContract
{
    use SoftDeletes, Translatable, SoftCascadeTrait, QueryCacheable;

    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    protected $table = 'images';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];
    /**
     * equivalent of ->cacheTags(['images'])
     * @var string
     * @author 
    */
    public $cacheTags = ['images'];
    /**
     * equivalent of ->cachePrefix('images');
     * @var string
     * @author 
    */
    public $cachePrefix = 'images_';
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
    protected $softCascade = ['images_translations'];

    /**
     * The attributes translate language.
     * @var array
     * @author 
     */
    public $translatedAttributes = ['name', 'script_code', 'image', 'link', 'video', 'description', 'locale', 'image_id'];

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
    public function images_translations()
    {
        return $this->hasMany(ImageTranslation::class);
    }

    /**
     * Relationship with position
     * @return mixed
     * @author 
     */
    public function position_image ()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
