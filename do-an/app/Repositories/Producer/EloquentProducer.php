<?php

namespace App\Repositories\Producer;

use App\Models\Producer;
use App\Repositories\AbstractRepository;

class EloquentProducer extends AbstractRepository implements ProducerRepository
{
    protected $model;

    /**
     * EloquentProducer constructor.
     * @param Producer $model
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function __construct(Producer $model)
    {
        $this->model = $model;
    }
    /**
     * Get all Producer
     * @param mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getAllProducer(){
        return $this->model->with('producer_translation')->where('status','on');
    }
}
