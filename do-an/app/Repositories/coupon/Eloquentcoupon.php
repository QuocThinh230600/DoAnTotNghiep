<?php

namespace App\Repositories\Coupon;

use App\Models\CouponModel;
use App\Repositories\AbstractRepository;

class EloquentCoupon extends AbstractRepository implements CouponRepository
{
    protected $model;

    /**
     * EloquentProductAttribute constructor.
     * @param Attribute $model
     * @author 
     */
    public function __construct(CouponModel $model)
    {
        $this->model = $model;
    }

    /**
     * Get color by id
     * @param int $id
     * @return object
     * @author Duy Bình <leduybinh.93@gmail.com>
     */
    public function getColorById(int $id): object
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * Get coupon by name
     * @param int $name
     * @return object
     * @author Duy Bình <leduybinh.93@gmail.com>
     */
    public function getCouponByCode($code)
    {
        return $this->model->where('code', '=', $code)->where('status', '=', 'on')->get();
    }
}
