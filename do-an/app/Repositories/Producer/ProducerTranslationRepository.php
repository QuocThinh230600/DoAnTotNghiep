<?php

namespace App\Repositories\Producer;

use App\Repositories\AbstractTranslationInterface;

interface ProducerTranslationRepository extends AbstractTranslationInterface
{
    public function getDetailProduct($slug);
}
