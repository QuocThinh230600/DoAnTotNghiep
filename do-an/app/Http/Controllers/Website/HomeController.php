<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ProductTranslation;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Config\ConfigRepository;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Image\ImageRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Page\PageRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductTranslationRepository;
use App\Repositories\ShowRoom\ShowRoomRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $view = 'website.modules.';

    private $category;
    private $image;
    private $news;
    private $product;
    private $config;
    private $page;
    private $content;
    function __construct(CategoryRepository $category, ImageRepository $image, NewsRepository $news, ProductRepository $product,
                         ConfigRepository $config,
                         PageRepository $page,
                         ContentRepository $content)
    {
        $this->category             = $category;
        $this->image                = $image;
        $this->news                 = $news;
        $this->product              = $product;
        $this->config               = $config;
        $this->page                 = $page;
        $this->content              = $content;
    }

    public function index()
    {
        $data['category']           = $this->category->getAllCategoryProduct() ?? null;
        $data['slide_banner']       = $this->image->getImageWithPosition(2)->get() ?? null;
        $data['imagesRight']        = $this->image->getImageWithPosition(3)->take(2)->get() ?? null;
        $data['imagesHome']         = $this->image->getImageWithPosition(5)->first() ?? null;    
        $data['newsSale']           = $this->news->getNews(3, 3) ?? null;
 
        $data['ProductSale']        = $this->product->getAllProduct()->where('featured', 'like', '%5%')->get() ?? null;
        $data['ProductHotCombo']    = $this->product->getAllProduct()->where('featured', 'like', '%4%')->get() ?? null;

        $data['config']             = $this->config->get_erro_image() ?? null;
        $data['cate_pro']           = $this->category->getCateWithPro() ?? null;
        $data['cate_all']           = $this->category->getAllCategoryRecursive() ?? null;
        $data['newsfooter']         = $this->news->getNews(9, 5) ?? null;
        $data['pageContent']        = $this->content->getContentWithPage(10);
        $data['meta']               = $this->page->query()->where('id',10)->first();
        
        return view($this->view . 'homes.page_home', $data);
    }
}
