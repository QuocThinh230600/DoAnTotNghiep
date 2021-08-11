<?php

namespace App\Models;

use App\Models\ShowRoom;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Province extends Model
{
    use QueryCacheable;
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    public $cacheFor = 3600; // equivalent of ->cacheFor(3600)

    protected $table = 'provinces';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * equivalent of ->cacheTags(['provinces'])
     * @var string
     * @author 
    */
    public $cacheTags = ['provinces'];
    /**
     * equivalent of ->cachePrefix('provinces');
     * @var string
     * @author 
    */
    public $cachePrefix = 'provinces_';
    
    /**
     * Invalidate the cache automatically
     * upon update in the database.
     *
     * @var bool
     */
    protected static $flushCacheOnUpdate = true;

    public function showroom()
    {
        return $this->hasMany(ShowRoom::class);
    }
}
