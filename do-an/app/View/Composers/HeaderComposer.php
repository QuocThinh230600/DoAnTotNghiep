<?php

namespace App\View\Composers;

use App\Http\Resources\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Create a new profile composer.
     *
     * @return void
     */
    private $category;
    private $product;
    private $content;

    public function __construct(CategoryRepository $category, 
                                ProductRepository $product,
                                ContentRepository $content)
    {
        $this->category = $category;
        $this->product  = $product;
        $this->content  = $content;
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
        $content     = $this->content->getContentWithPage(8);

        $view->with('categorys', $categorys)->with('content', $content);
       
    }
}
