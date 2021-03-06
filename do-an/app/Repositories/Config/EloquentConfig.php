<?php

namespace App\Repositories\Config;

use App\Models\Config;
use App\Repositories\AbstractRepository;

class EloquentConfig extends AbstractRepository implements ConfigRepository
{
    protected $model;

    /**
     * EloquentConfig constructor.
     * @param Config $model
     * @author 
     */
    public function __construct(Config $model)
    {
        $this->model = $model;
    }

    /**
     * Update value config from attrubute
     * @param string $attribute
     * @param string $value
     * @return mixed
     * @author 
     */
    public function update_value(string $attribute, string $value = null)
    {
        return $this->model->where('attribute', $attribute)->update([
            'value'      => $value,
            'updated_at' => new \DateTime()
        ]);
    }

    /**
     * Get all config
     * @return mixed
     * @author 
     */
    public function get_all_config()
    {
        return $this->model->pluck('value', 'attribute')->toArray();
    }

    /**
     * Get erro image config
     * @return mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function get_erro_image(){
        return $this->model->where('id', '=', 26)->first();
    }
}
