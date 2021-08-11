<?php

namespace App\Repositories\Ward;

use App\Models\Ward;
use App\Repositories\AbstractRepository;

class EloquentWard extends AbstractRepository implements WardRepository
{
    protected $model;

    /**
     * EloquentWard constructor.
     * @param Ward $model
     * @author 
     */
    public function __construct(Ward $model)
    {
        $this->model = $model;
    }

    /**
     * Get all ward
     * @return object
     * @author 
     */
    public function getAllWard (): object
    {
        return $this->model->with(['district' => function ($query){
            $query->with('province');
        }]);
    }

    /**
     * Get ward by district
     * @param int $district
     * @return object
     * @author 
     */
    public function getWardByDistrict (int $district): object
    {
        return $this->model->where('district_id', $district)->get();
    }
}
