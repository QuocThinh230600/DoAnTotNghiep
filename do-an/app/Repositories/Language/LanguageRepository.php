<?php

namespace App\Repositories\Language;

use App\Repositories\AbstractInterface;

interface LanguageRepository extends AbstractInterface
{
    /**
     * Check language default on the site
     * @return bool
     * @author 
     */
    public function checkLanguageDefault(): bool;

    /**
     * Check language default on the site when edit or delete data
     * @param $uuid
     * @return bool
     * @author 
     */
    public function checkLanguageDefaultByUuid($uuid): bool;

    /**
     * Check language current
     * @return object
     * @author 
     */
    public function checkLanguageCurrent();

    /**
     * Get all language with status is on
     * @return object
     * @author 
     */
    public function getAllWithStatusOn(): object;

    /**
     * Get all locale language
     * @return object
     * @author 
     */
    public function getAllLocale(): object;

    /**
     * Get language by locale
     * @param array $locale
     * @return object
     * @author 
     */
    public function getLanguageByLocale($locale): object;
}
