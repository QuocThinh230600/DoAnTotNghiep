<?php

namespace App\View\Composers;
use Illuminate\View\View;
use App\Repositories\Config\ConfigRepository;

class HeadComposer
{
    /**
     * Create a new profile composer.
     *
     * @return void
     */
    private $config;

    public function __construct(ConfigRepository $config)
    {
        $this->config = $config;
    }


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $config = $this->config->getById(24);

        $view->with('config', $config);
    }

}
