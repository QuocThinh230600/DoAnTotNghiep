<?php

namespace App\Repositories\Category;

use App\Models\CategoryTranslation;
use App\Repositories\AbstractTranslationRepository;

class EloquentCategoryTranslation extends AbstractTranslationRepository implements CategoryTranslationRepository
{
    protected $model;

    /**
     * EloquentCategoryTranslation constructor.
     * @param CategoryTranslation $model
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function __construct(CategoryTranslation $model)
    {
        $this->model = $model;
    }

    /**
     * get id category with slug
     * @return mixed
     * @author Trần Luân <luantran4555@gmail.com>
     */
    public function getIDCategory($slug)
    {   
        return $this->model->where('slug','=', $slug)->value('category_id');
    }

    /**
     * get child category with parent category
     * @return mixed
     * @author Trần Luân <luantran4555@gmail.com>
     */
    public function getchildCategory($id)
    {   
        return $this->model->leftJoin('categories', 'category_id','=','categories.id')
        ->where('categories.parent_id','=',$id)->whereNull('categories.deleted_at');
    }
}
