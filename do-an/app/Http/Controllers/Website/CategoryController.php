<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Resources\Image;
use App\Http\Controllers\Controller;
use App\Repositories\Page\PageRepository;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Config\ConfigRepository;
use App\Repositories\Content\ContentRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Producer\ProducerRepository;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryTranslationRepository;
use App\Repositories\Producer\ProducerTranslationRepository;

class CategoryController extends Controller
{

    private $view = 'website.modules.';
    private $product;
    private $categorytrans;
    private $producer;
    private $image;
    private $config;
    private $producerTrans;
    private $content;
    private $page;
    private $attribute;
    private $category;

    function __construct(ProductRepository $product, CategoryTranslationRepository $categorytrans,
                            ProducerRepository $producer, ImageRepository $image, ConfigRepository $config,
                            ProducerTranslationRepository $producerTrans,
                            ContentRepository $content,
                            PageRepository $page,
                            AttributeRepository $attribute,
                            CategoryRepository $category)
    {
        $this->product              = $product;
        $this->categorytrans        = $categorytrans;
        $this->producer             = $producer;
        $this->image                = $image;
        $this->config               = $config;
        $this->producerTrans        = $producerTrans;
        $this->content              = $content;
        $this->page                 = $page;
        $this->attribute            = $attribute;
        $this->category             = $category;
    } 
    function index($slug){  
        $data['catId']             = $this->categorytrans->getIDCategory($slug);
        $data['products']           = $this->product->getCategorys($data['catId'])->paginate(11);
        $data['producers']          = [];
        foreach ($this->product->getCategorys($data['catId'])->get()  as $item) {
            $data['producers'][]    = $item->producer;
        }

        $data['category']           = $this->category->query()->where('id','=', $data['catId'])->first();
        
        $data['catebanner']         = [
            $data['category']->banner1, 
            $data['category']->banner2, 
            $data['category']->banner3
        ];
        $data['catelink']           = [
            $data['category']->link1,
            $data['category']->link2,
            $data['category']->link3
        ];
        
        $data['producers']          = array_unique($data['producers']);
        $data['config']             = $this->config->get_erro_image() ?? null;
        $data['images']             = $this->image->getImageWithPosition(6)->take(6)->get() ?? null;
        $data['rightimages']        = $this->image->getImageWithPosition(7)->take(2)->get() ?? null;
        $data['childcategorys']     = $this->categorytrans->getchildCategory($data['catId'])->get();
        $data['pageContent']        = $this->content->getContentWithPage(11);
        $data['meta']               = $data['category'];
        $data['countPro']           = $this->product->getCategorys($data['catId'])->count() - 11;
        $data['attribute']          = $this->attribute->getAllAttrProByIdcat($data['catId']);
        // dd($data['meta']->name);
        return view($this->view . 'category.page_cate', $data);
    }

    function brand($slug){

        $data['idProducer']         = $this->producerTrans->query()->where('slug', '=', $slug)->value('producer_id');
        $data['products']           = $this->product->getAllQuery()->where('producer_id','=', $data['idProducer'])->whereNull('deleted_at')->paginate(11);
        $data['producers']          = [];
        if (count($data['products'])>0) {
            foreach ($this->product->getCategorys($data['products'][0]->category_product()->first()->category_id)->get()  as $item) {
                $data['producers'][]    = $item->producer;
            }
            $data['producers']          = array_unique($data['producers']);
        }
        $data['config']             = $this->config->get_erro_image() ?? null;
        $data['images']             = $this->image->getImageWithPosition(6)->take(6)->get() ?? null;
        $data['rightimages']        = $this->image->getImageWithPosition(7)->take(2)->get() ?? null;
        $data['pageContent']        = $this->content->getContentWithPage(11);

        $data['metaproducer']       = $this->producer->query()->where('id', '=', $data['idProducer'])->first();

        $data['meta']               = $data['metaproducer'];
        $data['countPro']           = $this->product->query()->where('producer_id','=', $data['idProducer'])->whereNull('deleted_at')->count() - 11;
        $data['attribute']          = $this->attribute->getAllAttrProByIdcat($data['idProducer'],1);

        return view($this->view . 'brand.page_brand', $data);
    
    }

    public function ajax(Request $request){
        // dd($request->all());
        $sort = $request->order ? $request->order : ''; 
        $price = $request->price ? $request->price : ''; 
        $attr = $request->attr ? $request->attr : ''; 
        $cat = $request->cat ? $request->cat : ''; 
        $producer = $request->producer ? $request->producer : ''; 
        $product = $this->product->getProductSort($sort, $cat, $producer, $attr, $price);
        if ($request->count && $request->count=='all') {
            $data['sorts'] = $product->get();
        } else {
            $data['sorts'] = $product->paginate(11);
        }
        
        
        $count = $product->count() - count($data['sorts']);
        $view = view('components.ajax_filter_products', $data)->render();
        // dd();
        return json_encode(['count'=>$count, 'view'=>$view]);
    }

    public function ajax_category(Request $request) {

    }
}
