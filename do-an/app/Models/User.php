<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\VerificationEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ForgotPasswordEmail;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles, SoftCascadeTrait, QueryCacheable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    // public $cacheFor = 3600; // equivalent of ->cacheFor(3600)

    protected $guarded = [];

    // public $cacheTags = ['users'];
    // /**
    //  * equivalent of ->cachePrefix('users_');
    //  * @var string
    //  * @author 
    // */
    // public $cachePrefix = 'users_';
    // /**
    //  * Invalidate the cache automatically
    //  * upon update in the database.
    //  *
    //  * @var bool
    //  */
    // protected static $flushCacheOnUpdate = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes date.
     *
     * @var array
     * @author 
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * The attributes soft delete with function name.
     * @var array
     * @author 
     */
    protected $softCascade = [];

    /**
     * Auto running on models
     * @author 
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }

    /**
     * Send the user a verification email
     * @author 
     */
    public function sendVerificationEmail()
    {
        $this->notify(new VerificationEmail($this));
    }

    /**
     * Send email forgot password with token
     * @param string $token
     * @author 
     */
    public function sendForgotPasswordEmail(string $token)
    {
        $this->notify(new ForgotPasswordEmail($this, $token));
    }
}
