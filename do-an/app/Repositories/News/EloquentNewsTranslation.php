<?php

namespace App\Repositories\News;

use App\Models\NewsTranslation;
use App\Repositories\AbstractTranslationRepository;

class EloquentNewsTranslation extends AbstractTranslationRepository implements NewsTranslationRepository
{
    protected $model;

    /**
     * EloquentNewsTranslation constructor.
     * @param NewsTranslation $model
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function __construct(NewsTranslation $model)
    {
        $this->model = $model;
    }

    /**
     * get id category with slug
     * @return mixed
     * @author Quốc Thịnh <luuthinh135@gmail.com>
     */
    public function getDetailNews($slug)
    {   
        return $this->model->where('slug','=', $slug)->first();
    }

    /**
     * get id category with slug
     * @return mixed
     * @author Quốc Thịnh <luuthinh135@gmail.com>
     */
    public function getIDNews($slug)
    {   
        return $this->model->where('slug','=', $slug)->value('news_id');
    }

    public function getchildCategory($id)
    {   
        return $this->model->leftJoin('categories', 'category_id','=','categories.id')
        ->where('categories.parent_id','=',$id)->whereNull('categories.deleted_at');
    }
}
