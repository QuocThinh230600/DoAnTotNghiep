<?php

namespace App\View\Composers;

use App\Repositories\Content\ContentRepository;
use App\Repositories\ShowRoom\ShowRoomRepository;
use Illuminate\View\View;

class FooterComposer
{
    /**
     * Create a new profile composer.
     *
     * @return void
     */
    
    private $showroom;
    private $content;

    public function __construct(ShowRoomRepository $showroom,
                                ContentRepository $content)
    {
        $this -> showroom = $showroom;
        $this-> content   = $content;
    }

    /**
     * Bind data to the view. 
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $city       = $this->showroom->getAllShowRoom()->where('province_id', '=', 50)->get();
        $province   = $this->showroom->getAllShowRoom()->where('province_id', '<>', 50)->get(); 
        $content    = $this->content->getContentWithPage(9);
        $view->with('city', $city)->with('province', $province)->with('content', $content);;

    }
}
