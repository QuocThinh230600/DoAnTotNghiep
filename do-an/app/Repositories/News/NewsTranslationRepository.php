<?php

namespace App\Repositories\News;

use App\Repositories\AbstractTranslationInterface;

interface NewsTranslationRepository extends AbstractTranslationInterface
{
    public function getDetailNews($slug);
    public function getIDNews($slug);
}
