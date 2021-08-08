<?php

namespace App\Repositories\Image;

use App\Repositories\AbstractInterface;

interface ImageRepository extends AbstractInterface
{
    /**
     * Get max position by position
     * @param int $position
     * @return int
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getMaxPosition(int $position): int;

    /**
     * Get all image with position
     * @return object
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function getAllImageWithPosition(): object;

    /**
     * Get image with position id
     * @return object
     * @author Luân Trần <luantran04555@gmail.com>
     */
    public function getImageWithPosition($id): object;

}
