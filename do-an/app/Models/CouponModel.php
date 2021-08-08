<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CouponModel extends BaseModel
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     * @var string
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    protected $table = 'coupons';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     * @var array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes soft delete with function name.
     * @var array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
    /**
     * The news that belong to the category.
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
}
