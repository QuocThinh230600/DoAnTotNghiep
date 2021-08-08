<?php

namespace App\View\Composers;

use App\Repositories\Content\ContentRepository;
use App\Repositories\ShowRoom\ShowRoomRepository;
use Illuminate\View\View;

class FooterServiceComposer
{
    /**
     * Create a new profile composer.
     *
     * @return void
     */
    
    private $showroom;
    private $content;

    public function __construct(
                                ContentRepository $content)
    {
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

        $content    = $this->content->getContentWithPage(9);
        $view->with('content', $content);;

    }
}
