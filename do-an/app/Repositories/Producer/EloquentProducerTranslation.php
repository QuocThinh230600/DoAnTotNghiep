<?php

namespace App\Repositories\Producer;

use App\Models\ProducerTranslation;
use App\Repositories\AbstractTranslationRepository;

class EloquentProducerTranslation extends AbstractTranslationRepository implements ProducerTranslationRepository
{
    protected $model;

    /**
     * EloquentProducerTranslation constructor.
     * @param ProducerTranslation $model
     * @author 
     */
    public function __construct(ProducerTranslation $model)
    {
        $this->model = $model;
    }

    public function getDetailProduct($slug)
    {
        return $this->model->where('slug','=', $slug)->first();
    }
}
