<?php

namespace App\Repositories\Category;

use App\Repositories\AbstractTranslationInterface;

interface CategoryTranslationRepository extends AbstractTranslationInterface
{
    /**
     * get id category with slug
     * @return mixed
     * @author Trần Luân <luantran4555@gmail.com>
     */
    public function getIDCategory($slug);
    /**
     * get child category with parent category
     * @return mixed
     * @author Trần Luân <luantran4555@gmail.com>
     */
    public function getchildCategory($id);
}
