<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;

class Captcha extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return mixed
     * @author 
     */
    public function __invoke()
    {
        return captcha_img();
    }
}
