<?php

namespace App\Repositories\Coupon;

use App\Repositories\AbstractInterface;

interface CouponRepository extends AbstractInterface
{
    public function getColorById(int $id): object;

    public function getCouponByCode($code);
}
