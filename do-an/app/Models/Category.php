<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Category extends BaseModel implements TranslatableContract
{
    use SoftDeletes, Translatable, SoftCascadeTrait, QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'categories';

    /**
     * equivalent of ->cacheTags(['categories'])
     * @var string
     * @author 
    */
    public $cacheTags = ['categories'];
    /**
     * equivalent of ->cachePrefix('categories');
     * @var string
     * @author 
    */
    public $cachePrefix = 'categories_';
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
    protected $softCascade = ['category_translation'];

    /**
     * The attributes translate language.
     * @var array
     * @author 
     */
    public $translatedAttributes = ['name', 'description', 'image', 'image_mobile', 'link', 'slug', 'title_tag', 'meta_keywords', 'meta_description', 'meta_robots', 'meta_google_bot', 'locale', 'categories_id']; 

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
    public function category_translation()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    /**
     * The news that belong to the category.
     * @return mixed
     * @author 
     */
    public function news()
    {
        return $this->belongsToMany(News::class, 'category_news');
    }
    /**
     * The news that belong to the product.
     * @return mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products');
    }
}
