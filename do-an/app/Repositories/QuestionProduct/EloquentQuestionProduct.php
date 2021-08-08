<?php

namespace App\Repositories\QuestionProduct;

use App\Models\QuestionProduct;
use App\Repositories\AbstractRepository;

class EloquentQuestionProduct extends AbstractRepository implements QuestionProductRepository
{
    /**
     * @var QuestionProduct
     */
    protected $model;

    /**
     * EloquentQuestionProduct constructor.
     *
     * @param QuestionProduct $model
     * @author Quoc Tuan
     */
    public function __construct(QuestionProduct $model)
    {
        $this->model = $model;
    }
}
