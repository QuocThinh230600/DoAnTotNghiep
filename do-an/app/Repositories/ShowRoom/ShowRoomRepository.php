<?php

namespace App\Repositories\ShowRoom;

use App\Repositories\AbstractInterface;

interface ShowRoomRepository extends AbstractInterface
{   
    /**
     * Get All ShowRoom.
     *
     * @param ShowRoom $model
     * @return mixed
     * @author Tran Luan
     */
    public function getAllShowRoom();
}
