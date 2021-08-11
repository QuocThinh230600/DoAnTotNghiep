<?php

namespace App\Repositories\Cart;

use App\Models\Paydetails;
use App\Repositories\AbstractRepository;

class EloquentPaydetails extends AbstractRepository implements PaydetailsRepository
{
    protected $model;

    /**
     * EloquentPosition constructor.
     * @param Paydetails $model
     * @author 
     */
    public function __construct(Paydetails $model)
    {
        $this->model = $model;
    }

    public function getOrderdetailRecursive($id): object
    {
        return $this->model
        ->select('image','name','quantity','paydetails.price','total', 'attribute')
        ->join('products','products.id', '=', 'product_id')
        ->join('products_translations','products.id','=','products_translations.product_id')
        ->where('payorders_id', $id)->get();
    }
}
