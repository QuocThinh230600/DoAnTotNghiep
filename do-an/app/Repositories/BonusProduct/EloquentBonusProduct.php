<?php

namespace App\Repositories\BonusProduct;

use App\Models\BonusProduct;
use App\Repositories\AbstractRepository;

class EloquentBonusProduct extends AbstractRepository implements BonusProductRepository
{
    /**
     * @var BonusProduct
     */
    protected $model;

    /**
     * EloquentBonusProduct constructor.
     *
     * @param BonusProduct $model
     * @author Quoc Tuan
     */
    public function __construct(BonusProduct $model)
    {
        $this->model = $model;
    }
}
