<?php

namespace App\Repositories\Producer;

use App\Repositories\AbstractInterface;

interface ProducerRepository extends AbstractInterface
{
    /**
     * Get all Producer
     * @param mixed
     * @author Trần Luân <luantran04555@gmail.com>
     */
    public function getAllProducer();
}
