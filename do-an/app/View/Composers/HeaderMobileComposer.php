<?php

namespace App\View\Composers;

use App\Repositories\Category\CategoryRepository;
use Illuminate\View\View;

class HeaderMobileComposer
{
    /**
     * Create a new profile composer.
     *
     * @return void
     */
    private $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $categorys   = $this->category->getAllCategoryProduct() ?? null;

        $view->with('categorys', $categorys);
    }
}
