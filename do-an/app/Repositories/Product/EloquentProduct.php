<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\AbstractRepository;

class EloquentProduct extends AbstractRepository implements ProductRepository
{
    /**
     * @var Product
     */
    protected $model;

    /**
     * EloquentProduct constructor.
     *
     * @param Product $model
     * @author Quoc Tuan
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
    /*
     * Get product position in product
     * @return int
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getNewPosition(): int
    {
        $position = $this->model->max('position');

        return ($position == null) ? 1 : $position + 1;
    }

    public function getProductUuid($uuid){
        $product     = $this->model->where('uuid', $uuid)->first();
        $category = $product->category_product()->pluck('category_id')->toArray();
        $images   = $product->product_images()->select('image','alt','position', 'image_position')->get();
        $attribute= $product->product_attribute()->get();
        $bonus   = $product->product_bonus()->get();
        $promotion   = $product->promotion()->get();

        return [
            'product'     => $product,
            'category' => $category,
            'images'   => $images,
            'attribute'=> $attribute,
            'bonus'    => $bonus,
            'promotion' => $promotion
        ];
    }
    /*
     * Get product Featured
     * @return mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getAllProductFeatured($id){
        return $this->model->where('featured', '=', $id)->get();
    }
    /*
     * Get all product
     * @return mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getAllProduct(){
        return $this->model->orderBy('created_at', 'DESC');
    }  
    
    /**
     * Get product with caterogy
     * @param string $id
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getCategorys($id)
    {
        return $this->model->whereHas('category_product', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->whereNull('deleted_at');
    }

    /**
     * Get product with caterogy
     * @param string $id
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getCategoryFeatured($id, $featured, $take)
    {
        return $this->model->whereHas('category_product', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->whereNull('deleted_at')->where('featured','=',$featured)->take($take)->get();
    }

    /**
     * Get product with caterogy
     * @param string $id
     * @return array
     * @author Duc Huy <huy.phamduc97@gmail.com>
     */
    public function getProductSort($option, $cat, $producer, $attr, $price){

        $data   = $this->model;
        if ($cat != "") {
            $data = $data->whereHas('category_product', function ($query) use ($cat) {
                $query->where('category_id', $cat);
            });
        }
        if ($producer != "") {
            $data = $data->whereHas('producer', function ($query) use ($producer) {
                $query->where('id', $producer);
            });
        }

        if ($price != "") {
            $price = explode(',',$price);
            $data = $data->whereBetween('price',$price);
        }

        if($attr != ""){
            foreach ($attr as $item) {
                $data = $data->whereHas('product_attribute', function ($query) use ($item) {
                    $query->where('attribute', $item['key'])->where('value', $item['value']);
                });
            }
        }
        

        switch($option){
            case 1:
                $data = $data->orderBy('price', 'ASC');
                break;
            case 2: 
                $data = $data->orderBy('price', 'DESC');
                break;
            case 3:
                $data = $data->orderBy('created_at', 'ASC');
                break;
            
        }
        return $data;
    }

    /**
     * Get product with key
     * @param string $keys
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function SearchProduct($key){
        return $this->model::LeftJoin('products_translations', 'products.id', '=', 'products_translations.product_id')->where('products_translations.name','LIKE', '%'. $key . '%')->get();
    }

    /**
     * Get product with product_id
     * @param string $product_id
     * @return array
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getbyProduct($id){
        return $this->model->where('id','=', $id)->first();
    }

}
