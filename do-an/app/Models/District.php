<?php

namespace App\Models;

use App\Models\ShowRoom;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class District extends Model
{
    use QueryCacheable;
    /**
     * The table associated with the model.
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)
    
    protected $table = 'districts';

    /**
     * The attributes that aren't mass assignable.
     * @var array`
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['districts'])
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
    */
    public $cacheTags = ['districts'];
    /**
     * equivalent of ->cachePrefix('districts');
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
    */
    public $cachePrefix = 'districts_';
    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;


    /**
     * Get the province that owns the district.
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function showroom()
    {
        return $this->hasMany(ShowRoom::class);
    }
}
