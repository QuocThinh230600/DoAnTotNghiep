<?php

namespace App\Models;

use App\Models\Ward;
use App\Models\District;
use App\Models\Province;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\QueryCache\Traits\QueryCacheable;

class ShowRoom extends BaseModel
{
    use SoftDeletes, QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)

    /**
     * The table associated with the model.
     *
     * @var string
     * @author Quoc Tuan
     */
    protected $table = 'show_rooms';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     * @author Quoc Tuan
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['show_rooms'])
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
    */
    public $cacheTags = ['show_rooms'];
    /**
     * equivalent of ->cachePrefix('show_rooms');
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
    */
    public $cachePrefix = 'show_rooms_';
    
    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     * @author Quoc Tuan
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The auto generate uuid
     *
     * @author Quoc Tuan
     */
    public static function boot ()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    public function district()
    {
        return $this->belongsTo(District::class,'district_id','id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class,'ward_id');
    }
}
