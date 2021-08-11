<?php

namespace App\Models;

use Illuminate\Support\Str;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Attribute extends BaseModel implements TranslatableContract
{
    use SoftDeletes, Translatable, SoftCascadeTrait, QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)

    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'attributes';

    /**
     * equivalent of ->cacheTags(['attributes'])
     * @var string
     * @author 
    */
    public $cacheTags = ['attributes'];
    /**
     * equivalent of ->cachePrefix('attributes_');
     * @var string
     * @author 
    */
    public $cachePrefix = 'attributes_';
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
     * The attributes soft delete with function name.
     * @var array
     * @author 
     */
    protected $softCascade = ['attribute_translation'];

    /**
     * The attributes translate language.
     * @var array
     * @author 
     */
    public $translatedAttributes = ['name', 'description', 'locale', 'attribute_id'];

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
    public function attribute_translation()
    {
        return $this->hasMany(AttributeTranslation::class);
    }

    /**
     * Get data by recursive
     * @return mixed
     * @author 
     */
    public function all_attribute_child_name()
    {
        return $this->belongsTo(Attribute::class, 'parent_id', 'id')->with('all_attribute_child_name');
    }

    /**
     * Get the attribute for the product.
     * @return mixed
     * @author s
     */
    public function attribute_product()
    {
        return $this->hasMany(ProductAttribute::class, 'attribute', 'id');
    }
}
