<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepository;
use App\Repositories\Category\CategoryTranslationRepository;
use App\Repositories\News\NewsTranslationRepository;
use App\Repositories\Page\PageRepository;
use Illuminate\Http\Request;

class NewDetailController extends Controller
{
    private $view = 'website.modules.';
    private $NewsTrans;
    private $news;
    private $page;
    
    function __construct(NewsRepository $news, NewsTranslationRepository $NewsTrans, PageRepository $page)
    {
        $this->news = $news;
        $this->NewsTrans = $NewsTrans;
        $this->page   = $page;
    }
    
    public function index($slug = null){
        $data['newsDetail']         = $this->NewsTrans->getDetailNews($slug);

        $newsID = $this->NewsTrans->getIDnews($slug);

        $CateID = $this->news->getCategorys($newsID);

        $data['newsralated'] = $this->news->getNews($CateID, 20);




        $data['newsSale']           = $this->news->getNews(3, 20);
        $data['newsRecruitment']    = $this->news->getNews(6, 20);
        $data['meta']               = $data['newsDetail'];

        return view($this->view . 'new_detail.page_new_detail', $data);
    }
}
