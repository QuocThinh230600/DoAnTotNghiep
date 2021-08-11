<?php

namespace App\Repositories\News;

use App\Repositories\AbstractInterface;

interface NewsRepository extends AbstractInterface
{
    /**
     * Get new position in news
     * @return int
     * @author 
     */
    public function getNewPosition(): int;

    /**
     * Get all data news with pivot category
     * @return object
     * @author 
     */
    public function getAllNews(): object;

    /**
     * Get data news with uuid
     * @param string $uuid
     * @return array
     * @author 
     */
    public function getNewsUuid(string $uuid): array;

    /**
     * Get data news with category_id
     * @param string $category_id
     * @return array
     * @author 
     */
    public function getAllNewsByCateId($category_id);

    /**
     * Get data news
     * @param string $category_id, $take
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getNews($category_id , $take);

    /**
     * Get product with caterogy
     * @param string $id
     * @return array
     * @author Quốc Thịnh <luuthinh135@gmail.com>
     */
    public function getCategorys($slug);

    /**
     * Get all data news with pivot category
     * @param string $category_id, $take
     * @return array
     * @author Quốc Thịnh <luuthinh135@gmail.com>
     */
    public function getNewsTop($category_id, $take);
}
