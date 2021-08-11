<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Ward extends Model
{
    use QueryCacheable;

    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)

    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'wards';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['wards'])
     * @var string
     * @author 
    */
    public $cacheTags = ['wards'];
    /**
     * equivalent of ->cachePrefix('wards');
     * @var string
     * @author 
    */
    public $cachePrefix = 'wards_';
    
    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    /**
     * Get the district that owns the ward.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
