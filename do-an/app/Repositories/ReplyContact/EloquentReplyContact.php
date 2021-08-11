<?php

namespace App\Repositories\ReplyContact;

use App\Models\ReplyContact;
use App\Repositories\AbstractRepository;

class EloquentReplyContact extends AbstractRepository implements ReplyContactRepository
{
    protected $model;

    /**
     * EloquentReplyContact constructor.
     * @param ReplyContact $model
     * @author 
     */
    public function __construct(ReplyContact $model)
    {
        $this->model = $model;
    }

    /**
     * Get all reply of contact
     * @param int $id
     * @return object
     * @author 
     */
    public function getAllReplyOfContact(int $id): object
    {
        return $this->model->with('users')->where('contact_id', $id)->get();
    }
}
