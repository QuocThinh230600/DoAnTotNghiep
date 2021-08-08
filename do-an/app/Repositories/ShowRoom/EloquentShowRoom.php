<?php

namespace App\Repositories\ShowRoom;

use App\Models\ShowRoom;
use App\Repositories\AbstractRepository;

class EloquentShowRoom extends AbstractRepository implements ShowRoomRepository
{
    /**
     * @var ShowRoom
     */
    protected $model;

    /**
     * EloquentShowRoom constructor.
     *
     * @param ShowRoom $model
     * @author Quoc Tuan
     */
    public function __construct(ShowRoom $model)
    {
        $this->model = $model;
    }
    /** 
     * Get All ShowRoom.
     *
     * @param ShowRoom $model
     * @return mixed
     * @author Tran Luan
     */
    public function getAllShowRoom(){
        return $this->model->where('status','=','on');
    }
}
