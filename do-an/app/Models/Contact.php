<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Contact extends BaseModel
{
    use SoftDeletes, SoftCascadeTrait, QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'contacts';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['contacts'])
     * @var string
     * @author 
    */
    public $cacheTags = ['contacts'];
    /**
     * equivalent of ->cachePrefix('contacts');
     * @var string
     * @author 
    */
    public $cachePrefix = 'contacts_';
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
    protected $softCascade = ['reply_contact'];

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
     * Relationship with reply
     * @return mixed
     * @author 
     */
    public function reply_contact()
    {
        return $this->hasMany(ReplyContact::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
