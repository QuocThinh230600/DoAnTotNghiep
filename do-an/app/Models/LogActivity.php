<?php

namespace App\Models;

class LogActivity extends BaseModel
{
    /**
     * The table associated with the model.
     * @var string
     * @author 
     */
    protected $table = 'log_activity';

    /**
     * The attributes that aren't mass assignable.
     * @var array
     * @author 
     */
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     * @var array
     * @author 
     */
    protected $dates = ['created_at', 'updated_at'];
}
