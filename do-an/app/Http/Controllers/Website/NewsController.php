<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepository;
use App\Repositories\Page\PageRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NewsController extends Controller
{
    private $view = 'website.modules.';

    private $news;
    private $category;
    private $page;

    function __construct(NewsRepository $news,
                         PageRepository $page)
    {
       $this->news = $news;
       $this->page = $page;

    }

    function index(){
        $data['newsAll']                    = $this->news->getNewsTop(9, 5);
        $data['newsSale']                   = $this->news->getNewsTop(3, 20);
        $data['newsRecruitment']            = $this->news->getNewsTop(6, 20);
        $data['newsTopPromotion']           = $this->news->getAllNews()->take(1)->get();
        $data['newsTopPromotionList']       = $this->news->getAllNews()->take(4)->get()  ?? null;
        if ( $data['newsTopPromotionList'] != null) {
            unset($data['newsTopPromotionList'][0]) ;
        }
        $data['meta']                       = $this->page->query()->where('id',17)->first();
        return view($this->view . 'news.page_news', $data);
    }

    public function ajax_news(Request $request)
    {
        $data['take'] = (int)$request->ajaxNews + 5;
        
        $data['newsAjax'] = $this->news->getNewsTop(9, $data['take']);
        $view = view('components.ajax_news', $data);
        echo $view;
    }
}   
