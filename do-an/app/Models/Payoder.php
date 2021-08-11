<?php

namespace App\Models;

use App\Models\Paydetails;
use App\Models\CouponModel;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payoder extends BaseModel
{

    use SoftDeletes;
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'payorders';

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

    public function paydetail()
    {
        return $this->hasMany(Paydetails::class,'id','payorder_id');
    }

    public function coupon()
    {
        return $this->belongsTo(CouponModel::class,'coupon_id','id');
    }

}
