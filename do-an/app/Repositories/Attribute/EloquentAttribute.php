<?php

namespace App\Repositories\Attribute;

use App\Models\Attribute;
use App\Repositories\AbstractRepository;
use App\Repositories\Product\ProductRepository;

class EloquentAttribute extends AbstractRepository implements AttributeRepository
{
    protected $model;
    protected $product;

    /**
     * EloquentProductAttribute constructor.
     * @param Attribute $model
     * @author 
     */
    public function __construct(Attribute $model, ProductRepository $product)
    {
        $this->model = $model;
        $this->product = $product;
    }

    /**
     * Get max position by parent
     * @param $parent
     * @return int
     * @author 
     */
    public function getMaxPosition(int $parent): int
    {
        $position = $this->model->where("parent_id", $parent)->max('position');
        return $position + 1;   
    }

    /**
     * Get all attribute
     * @return object
     * @author 
     */
    public function getAllAttributeRecursive(): object
    {
        return $this->model->where('id', '!=', 1)->orderBy('position', 'ASC')->get();
    }

    /**
     * Get all attribute to update
     * @param int $id
     * @return mixed
     * @author 
     */
    public function getAllAttributeRecursiveToUpdate(int $id)
    {
        return $this->model->where(
            [
                ['parent_id', '!=', $id],
                ['id', '!=', $id],
                ['id', '!=', 1]
            ]
        )->orderBy('position', 'ASC')->get();
    }

    /**
     * Count child to delete
     * @param string $uuid
     * @return int
     * @author 
     */
    public function countChildToDelete($uuid): int
    {
        $category_id = $this->getIdByUuid($uuid);

        $totalCategory = $this->model->where('parent_id', $category_id)->count();

        if ($totalCategory <= 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get all attribute
     * @return mixed
     * @author 
     */
    public function getAllAttribute ()
    {
        return $this->model->with('all_attribute_child_name');
    }

    public function getAllAttrProByIdcat($idcat,$status = 0){
        if ($status==0) {
            $arrayIdProduct             = $this->product->getAllQuery()->whereHas('category_product', function ($query) use ($idcat) {
                $query->where('category_id', $idcat);
            })->pluck('id')->toArray();
        } else {
            $arrayIdProduct             = $this->product->getAllQuery()->whereHas('producer', function ($query) use ($idcat) {
                $query->where('id', $idcat);
            })->pluck('id')->toArray();
        }
        
       
        $attribute              = $this->model->query()->whereHas('attribute_product', function ($query) use ($arrayIdProduct) {
            $query->whereIn('product_id', $arrayIdProduct);
        })->where('status','on')->get();
        $result=[];
        foreach ($attribute as $item) {
            $arr['attr']    = $item;
            $value          = $item->attribute_product()->whereIn('product_id',$arrayIdProduct)->orderBy('value')->pluck('value')->toArray();
            $arr['value']   = array_unique($value);
            $result[]       = $arr;
        }
        return $result;
    }
    
}
