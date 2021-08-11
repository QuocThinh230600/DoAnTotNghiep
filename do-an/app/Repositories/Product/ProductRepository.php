<?php

namespace App\Repositories\Product;

use App\Repositories\AbstractInterface;

interface ProductRepository extends AbstractInterface
{
    /**
     * Get product position in product
     * @return int
     * @author 
     */
    public function getNewPosition(): int;
    public function getProductUuid($uuid);
    /*
     * Get product Featured
     * @return mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getAllProductFeatured($id);
    /*
     * Get all product
     * @return mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getAllProduct();
    
    /**
     * Get product with caterogy
     * @param string $slug
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getCategorys($slug);


    /**
     * Get product with caterogy
     * @param string $id
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getCategoryFeatured($id, $featured, $take);

    /**
     * Get product with caterogy
     * @param string $id
     * @return array
     * @author Duc Huy <huy.phamduc97@gmail.com>
     */
    public function getProductSort($option, $cat, $producer, $attr, $price);

    /**
     * Get product with key
     * @param string $key
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function SearchProduct($key);

    /**
     * Get product with product_id
     * @param string $product_id
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getbyProduct($id);


}
