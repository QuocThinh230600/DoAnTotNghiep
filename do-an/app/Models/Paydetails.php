<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paydetails extends BaseModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'paydetails';

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

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}
