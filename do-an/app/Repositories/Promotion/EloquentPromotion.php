<?php

namespace App\Repositories\Promotion;

use App\Models\Promotion;
use App\Repositories\AbstractRepository;

class EloquentPromotion extends AbstractRepository implements PromotionRepository
{
    /**
     * @var Promotion
     */
    protected $model;

    /**
     * EloquentPromotion constructor.
     *
     * @param Promotion $model
     * @author Quoc Tuan
     */
    public function __construct(Promotion $model)
    {
        $this->model = $model;
    }
}
