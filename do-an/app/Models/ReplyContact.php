<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class ReplyContact extends BaseModel
{
    use SoftDeletes, SoftCascadeTrait,QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)

    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'reply_contacts';
    
    public $cacheTags = ['reply_contacts'];
    /**
     * equivalent of ->cachePrefix('reply_contacts_');
     * @var string
     * @author 
    */
    public $cachePrefix = 'reply_contacts_';
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
    protected $dates = [ 'created_at', 'updated_at'];

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
     * Relationship with user
     * @return mixed
     * @author 
     */
    public function users () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
