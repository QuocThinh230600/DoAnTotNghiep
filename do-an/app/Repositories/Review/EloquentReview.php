<?php

namespace App\Repositories\Review;

use App\Models\Review;
use App\Repositories\AbstractRepository;

class EloquentReview extends AbstractRepository implements ReviewRepository
{
    /**
     * @var Review
     */
    protected $model;

    /**
     * EloquentReview constructor.
     *
     * @param Review $model
     * @author Quoc Tuan
     */
    public function __construct(Review $model)
    {
        $this->model = $model;
    }
}
