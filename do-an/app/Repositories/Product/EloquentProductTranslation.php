<?php

namespace App\Repositories\Product;

use App\Models\ProductTranslation;
use App\Repositories\AbstractTranslationRepository;

class EloquentProductTranslation extends AbstractTranslationRepository implements ProductTranslationRepository
{
    protected $model;

    /**
     * EloquentProductTranslation constructor.
     * @param ProductTranslation $model
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function __construct(ProductTranslation $model)
    {
        $this->model = $model;
    }

    /**
     * get all product by promotion_id
     * @param $promotion_id
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getAllProductByPromotion($promotion_id)
    {
        return $this->model->where('promotion_id',$promotion_id)->get();
    }
    /**
     * get all product by product_id
     * @param $product_id
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getByProductId($product_id){
        return $this->model->where('product_id',$product_id)->first(); 
    }

    public function getAllProductRecursive(){
        return $this->model->leftJoin('products','product_id','=','products.id')->where('products.deleted_at','=',null)->get();
    }
    /**
     * get product_id by slug
     * @param $slug
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getByPID($slug){
        return $this->model->where('slug', '=', $slug)->value('product_id');
    }

}
