<?php

namespace App\Repositories\Province;

use App\Models\Province;
use App\Repositories\AbstractRepository;

class EloquentProvince extends AbstractRepository implements ProvinceRepository
{
    protected $model;

    /**
     * EloquentProvince constructor.
     * @param Province $model
     * @author 
     */
    public function __construct(Province $model)
    {
        $this->model = $model;
    }
}
