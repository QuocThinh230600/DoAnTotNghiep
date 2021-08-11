<?php

namespace App\Models;

use App\Models\Review;
use App\Models\Contact;
use App\Models\Promotion;
use Illuminate\Support\Str;
use App\Models\BonusProduct;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Product extends BaseModel implements TranslatableContract
{
    use SoftDeletes, Translatable, SoftCascadeTrait, QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'products';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['products'])
     * @var string
     * @author 
    */
    public $cacheTags = ['products'];
    /**
     * equivalent of ->cachePrefix('products');
     * @var string
     * @author 
    */
    public $cachePrefix = 'products_';
    
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
    protected $softCascade = ['product_translation', 'product_images', 'category_product'];

    /**
     * The attributes translate language.
     * @var array
     * @author 
     */
    public $translatedAttributes = ['name', 'quantity', 'promotion_id', 'parent_id' , 'description', 'content', 'image', 'youtube', 'file', 'slug', 'title_tag', 'meta_keywords', 'meta_description', 'locale', 'product_id'];

    /**
     * The auto generate uuid
     * @author 
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    /**
     * Relationship with translation
     * @return mixed
     * @author 
     */
    public function product_translation()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    /**
     * The category that belong to the news.
     * @return mixed
     * @author 
     */
    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    /**
     * The category that belong to the product.
     * @return mixed
     * @author 
     */
    public function category_product()
    {
        return $this->hasMany(CategoryProduct::class);
    }

    /**
     * Get the images for the product.
     * @return mixed
     * @author 
     */
    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get the attribute for the product.
     * @return mixed
     * @author 
     */
    public function product_attribute()
    {
        return $this->hasMany(ProductAttribute::class);
    }

     /**
     * Get the bonus for the product.
     * @return mixed
     * @author 
     */
    public function product_bonus()
    {
        return $this->hasMany(BonusProduct::class);
    }

    /**
     * Get the attribute for the product.
     * @return mixed
     * @author 
     */
    public function attribute_product()
    {
        return $this->belongsToMany(AttributeTranslation::class, 'product_attributes');
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class,'producer_id','id');
    }

    public function promotion()
    {
        return $this->hasMany(Promotion::class,'product_id','id');
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class,'product_id','id');
    }

}
