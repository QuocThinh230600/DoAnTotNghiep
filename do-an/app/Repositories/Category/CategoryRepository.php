<?php

namespace App\Repositories\Category;

use App\Repositories\AbstractInterface;

interface CategoryRepository extends AbstractInterface
{
    /**
     * Get max position by parent
     * @param $parent
     * @return int
     * @author 
     */
    public function getMaxPosition(int $parent): int;

    /**
     * Get all category
     * @return object
     * @author 
     */
    public function getAllCategoryRecursive(): object;

    /**
     * Get all category to update
     * @param int $id
     * @return mixed
     * @author 
     */
    public function getAllCategoryRecursiveToUpdate(int $id);

    /**
     * Ajax update position table
     * @param int $id
     * @param int $position
     * @return mixed
     * @author 
     */
    public function updatePositionTable(int $id, int $position);

    /**
     * Count child to delete
     * @param string $uuid
     * @return int
     * @author 
     */
    public function countChildToDelete($uuid): int;

    /**
     * get all category child by parent id
     * @param string $id
     * @return int
     * @author 
     */

    public function getAllCategoryRecursiveProduct($id);

    public function getAllCategoryProduct();
    /**
     * get all product child category
     * @return mixed
     * @author Trần Luân <luantran4555@gmail.com>
     */
    public function getCateWithPro();
    
}
