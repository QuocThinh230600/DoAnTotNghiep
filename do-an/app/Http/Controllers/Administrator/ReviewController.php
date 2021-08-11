<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Helpers\LogActivityHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Review\ReviewRepository;

class ReviewController extends Controller
{
    /**
     * ReviewController constructor.
     * @author 
     */
    private $view   = 'administrator.modules.review.';

    private $route  = 'admin.review.';

    private $module = 'module.review';

    private $review;

    public function __construct(ReviewRepository $review)
    {
        $this->middleware('permission:review_index', ['only' => ['show', 'index', 'dataTableIndex']]);
        $this->middleware('permission:review_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:review_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:review_destroy', ['only' => ['destroy']]);
        $this->review            = $review;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     * @author 
     */
    public function index()
    {
        
        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     * @author 
     */
    public function create()
    {
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return mixed
     * @author 
     */
    public function store(StoreRequest $request)
    {
        $review            = null;

        $review                = $request->except(['_token', '_method']);
        if(!$request->status=='on'){
            $review['status']            = 'off';
        }
        $review                = $this->review->create($review);
        Review::flushQueryCache(['review']);

        LogActivityHelper::addToLog([
            'module'      => 'review',
            'action'      => 'create',
            'description' => $request->name
        ]);

        return response()->json(
            [
                'status'   => 'success',
                'message'  => message_module($this->module, 'crud.create_success'),
                'redirect' => route($this->route . 'create'),
                'result'   => array('review' => $review)
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return mixed
     * @author 
     */
    public function show(string $uuid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return mixed
     * @author 
     */
    public function edit(string $uuid)
    {
        $data['review'] = $this->review->getByUuid($uuid);

        return view($this->view . 'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  string  $uuid
     * @return mixed
     * @author 
     */
    public function update(UpdateRequest $request, string $uuid)
    {   
        $review            = null;
        $review                = $request->except(['_token', '_method']);
        if(!$request->status=='on'){
            $review['status']            = 'off';
        }
        $review                = $this->review->update($review,$uuid);

        LogActivityHelper::addToLog([
            'module'      => 'review',
            'action'      => 'edit',
            'description' => $request->name
        ]);
        Review::flushQueryCache(['review']);

        return response()->json(
            [
                'status'   => 'success',
                'message'  => message_module($this->module, 'crud.edit_success'),
                'redirect' => route($this->route . 'edit', ['review' => $uuid]),
                'result'   => array('review' => $review)
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return mixed
     * @author 
     */
    public function destroy(string $uuid)
    {
        $data = $this->review->getByUuid($uuid);

        LogActivityHelper::addToLog([
            'module'      => 'review',
            'action'      => 'delete',
            'description' => $data->name,
        ]);

        $result = $this->review->remove($uuid);
        Review::flushQueryCache(['review']);

        return response()->json(
            [
                'status'  => 'success',
                'message' => message_module($this->module, 'crud.destroy_success'),
                'result'  => $result
            ], 200);
    }

    public function dataTableIndex()
    {
        $review = $this->review->getAllQuery();

        return Datatables::of($review)
        ->editColumn('content', function ($review) {
            return Str::limit(strip_tags($review->content ?? ''), 50);
        })
        ->editColumn('votes', function ($review) {
            $xhtml="";  
            for ($i=0; $i < $review->votes ; $i++) { 
                $xhtml.="<i class='icon-star-full2' style= 'color:#dbdb2c'></i>";
            }
            return $xhtml;
        })
        ->editColumn('product_id', function ($review) {
            
            return $review->product->name;
        })
        ->editColumn('status', function ($review) {
            if ($review->status == 'on') {
                $xhtml = '<span class="badge btn-xs badge-info">' . label('element.status_enable') . '</span>';
            } else {
                $xhtml = '<span class="badge badge-secondary">' . label('element.status_disable') . '</span>';

            }
            return $xhtml;
        })
        ->addColumn('actions', function ($review) {
            return view('administrator.modules.review.actions', ['uuid' => $review->uuid, 'review' => $this]);
        })
        ->rawColumns(['actions', 'status','votes'])
        ->addIndexColumn()
        ->make(true);
    }

    public function changeStatus($uuid){
        $data = $this->review->getByUuid($uuid);
        $review['status']='on';
        if($data->status=='on'){
            $review['status']='off';
        }
        $review                = $this->review->update($review,$uuid);
        Review::flushQueryCache(['review']);

        // LogActivityHelper::addToLog([
        //     'module'      => 'review',
        //     'action'      => 'edit',
        //     'description' => $review->name
        // ]);

        // return response()->json(
        //     [
        //         'status'   => 'success',
        //         'message'  => message_module($this->module, 'crud.edit_success'),
        //         'redirect' => route($this->route . 'index'),
        //         'result'   => array('review' => $review)
        //     ], 200);
        return back();
    }
}
