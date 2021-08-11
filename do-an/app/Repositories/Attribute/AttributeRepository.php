<?php

namespace App\Repositories\Attribute;

use App\Repositories\AbstractInterface;

interface AttributeRepository extends AbstractInterface
{
    /**
     * Get max position by parent
     * @param $parent
     * @return int
     * @author 
     */
    public function getMaxPosition(int $parent): int;

    /**
     * Get all attribute
     * @return object
     * @author 
     */
    public function getAllAttributeRecursive(): object;

    /**
     * Get all attribute to update
     * @param int $id
     * @return mixed
     * @author 
     */
    public function getAllAttributeRecursiveToUpdate(int $id);

    /**
     * Count child to delete
     * @param string $uuid
     * @return int
     * @author 
     */
    public function countChildToDelete($uuid): int;

    /**
     * Get all attribute
     * @return mixed
     * @author 
     */
    public function getAllAttribute ();

    public function getAllAttrProByIdcat($idcat);
    
}
