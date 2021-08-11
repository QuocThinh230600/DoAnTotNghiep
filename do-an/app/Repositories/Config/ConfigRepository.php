<?php

namespace App\Repositories\Config;

use App\Repositories\AbstractInterface;

interface ConfigRepository extends AbstractInterface
{
    /**
     * Update value config from attrubute
     * @param string $attribute
     * @param string $value
     * @return mixed
     * @author 
     */
    public function update_value(string $attribute, string $value = null);

    /**
     * Get all config
     * @return mixed
     * @author 
     */
    public function get_all_config();
    
    /**
     * Get erro image config
     * @return mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function get_erro_image();
}
