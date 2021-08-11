<?php

namespace App\Repositories\Ward;

use App\Repositories\AbstractInterface;

interface WardRepository extends AbstractInterface
{
    /**
     * Get all ward
     * @return object
     * @author 
     */
    public function getAllWard (): object;

    /**
     * Get ward by district
     * @param int $district
     * @return object
     * @author 
     */
    public function getWardByDistrict (int $district): object;
}
