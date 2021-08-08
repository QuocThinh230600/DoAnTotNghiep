<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use App\Models\AttributeTranslation;
use App\Repositories\Attribute\AttributeRepository;
use App\Repositories\Attribute\AttributeTranslationRepository;
use App\Repositories\Content\ContentRepository;
use App\Repositories\News\NewsRepository;
use App\Repositories\Page\PageRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductTranslationRepository;
use App\Repositories\QuestionProduct\QuestionProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $view = 'website.modules.';

    private $product;
    private $productTranslation;
    private $attribute;
    private $attributeTrans;
    private $news;
    private $questionProduct;
    private $content;
    private $page;

    function __construct(ProductRepository $product,
                         ProductTranslationRepository $productTranslation,
                         AttributeRepository $attribute,
                         AttributeTranslationRepository $attributeTrans,
                         NewsRepository $news,
                         QuestionProductRepository $questionProduct,
                         ContentRepository $content,
                         PageRepository $page)
    {
        $this->product              =   $product;
        $this->productTranslation   =   $productTranslation;
        $this->attribute            =   $attribute;
        $this->attributeTrans       =   $attributeTrans;
        $this->news                 =   $news;
        $this->questionProduct      =   $questionProduct;
        $this->content              =   $content;
        $this->page                 =   $page;
    }
    public function index($slug){
        $data['productID'] = $IDPro   = $this->productTranslation->getByPID($slug);
        $data['productDetail']        = $this->product->getbyProduct($data['productID']);
        $data['MultiImage']           = $data['productDetail']->product_images()->where('image_position','=', 1)->get();
        $data['TechnicalImage']       = $data['productDetail']->product_images()->where('image_position','=', 2)->get();
        $data['PostImage']            = $data['productDetail']->product_images()->where('image_position','=', 3)->get();
        $data['productAttribute']     = $data['productDetail']->product_attribute()->take(6)->get();
        $data['bonusProduct']         = $data['productDetail']->product_bonus()->get();
        $data['attributeProduct']     = $this->attributeTrans->attribute_product($IDPro);
        $data['Productnews']          = $this->news->getAllNews()->take(4)->get()  ?? null;
        $data['ProductQuestion']      = $this->questionProduct->query()->where('status','=','on')->get();
        $cateID                       = $data['productDetail']->category()->value('category_id');
        $data['productRelated']       = $this->product->query()->whereHas('category_product', function ($query) use ($cateID) {
            $query->where('category_id','=', $cateID);
        })->take(4)->get();
        $data['productFeatured']      = $this->product->getAllProduct()->where('featured', '=', 3)->where('id', '<>', $IDPro)->take(4)->get() ?? null;
        $data['AttributeParent']      = $this->attribute->query()->where('parent_id','=','1')->get();
        $data['pageContent']          = $this->content->getContentWithPage(12);
        $data['meta']                 = $data['productDetail'];
       
        $data['bonusCombojson']           = [];
        foreach ($data['bonusProduct'] as $bonus) {
            $data['bonusCombojson'][] = $bonus->value;
        }
        $data['bonusCombojson']   = json_encode($data['bonusCombojson']);

        $data['review'] = $data['productDetail']->review()->where('status','on')->orderBy('created_at','desc')->paginate(10);
        return view($this->view . 'product.page_product', $data);
    }

    public function getReview(Request $request)
    {
        $product=$this->product->getById($request->id);
        $data['review'] = $product->review()->where('status','on');
        if ($request->order == 1) {
            $data['review'] = $data['review']->orderBy('created_at','desc');
        } else {
            $data['review'] = $data['review']->orderBy('created_at','asc');
        }
        $data['review']=$data['review']->paginate(10);
        return view('components.ajax_review',$data)->render();
    }
}
