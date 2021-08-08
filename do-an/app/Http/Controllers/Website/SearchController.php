<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Page\PageRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductTranslationRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $view = 'website.modules.';
    private $product;
    private $content;
    private $page;

    function __construct(ProductRepository $product,
                         ContentRepository $content,
                         PageRepository $page)
    {
        $this->product      = $product;
        $this->content      = $content;
        $this->page         = $page;
    }

    public function index(Request $request){
        $data['key']                  =   $request->key;
        $data['Search']               =   $this->product->SearchProduct($data['key']);
        $data['pageContent']          =   $this->content->getContentWithPage(13);
        $data['meta']                 = $this->page->query()->where('id',13)->first();

        return view($this->view . 'search.page_search',$data);
    }
}
