<?php

namespace App\Repositories\Image;

use App\Models\Image;
use App\Repositories\AbstractRepository;

class EloquentImage extends AbstractRepository implements ImageRepository
{
    protected $model;

    /**
     * EloquentImage constructor.
     * @param Image $model
     * @author 
     */
    public function __construct(Image $model)
    {
        $this->model = $model;
    }

    /**
     * Get max position by position
     * @param int $position
     * @return int
     * @author 
     */
    public function getMaxPosition(int $position): int
    {
        $position = $this->model->where("position_id", $position)->max('position');
        return $position + 1;
    }

    /**
     * Get all image with position
     * @return mixed
     * @author 
     */
    public function getAllImageWithPosition(): object
    {
        return $this->model->with('position_image');
    }

    /**
     * Get image with position id
     * @return mixed
     * @author Luân Trần <luantran04555@gmail.com>
     */
    public function getImageWithPosition($id): object
    {
        return $this->model->where('position_id', '=', $id)->where('status','on')->orderBy('position', 'ASC');
    }
}

