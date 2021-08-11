<?php

namespace App\Models;

class PasswordResets extends BaseModel
{
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'password_resets';

    /**
     * The attributes that are mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];
}
