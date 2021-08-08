<?php

namespace App\Repositories\Product;

use App\Repositories\AbstractTranslationInterface;

interface ProductTranslationRepository extends AbstractTranslationInterface
{
/**
     * get all product by promotion_id
     * @param $promotion_id
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getAllProductByPromotion($promotion_id);
    /**
     * get all product by product_id
     * @param $product_id
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getByProductId($product_id);

    public function getAllProductRecursive();

    /**
     * get product_id by slug
     * @param $slug
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getByPID($slug);

}
