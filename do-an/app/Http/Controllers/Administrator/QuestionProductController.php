<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\QuestionProduct;
use Yajra\DataTables\DataTables;
use App\Helpers\LogActivityHelper;
use App\Http\Controllers\Controller;
use App\Repositories\QuestionProduct\QuestionProductRepository;
use App\Http\Requests\Administrator\QuestionProduct\StoreRequest;
use App\Http\Requests\Administrator\QuestionProduct\UpdateRequest;

class QuestionProductController extends Controller
{
    /**
     * QuestionProductController constructor.
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    private $view   = 'administrator.modules.questionProduct.';

    private $route  = 'admin.questionProduct.';

    private $module = 'module.questionProduct';

    private $questionProduct;

    public function __construct(QuestionProductRepository $questionProduct)
    {
        $this->middleware('permission:questionProduct_index', ['only' => ['show', 'index', 'dataTableIndex']]);
        $this->middleware('permission:questionProduct_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:questionProduct_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:questionProduct_destroy', ['only' => ['destroy']]);
        $this->questionProduct            = $questionProduct;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function index()
    {
        return view($this->view . 'index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
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
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function store(StoreRequest $request)
    {
        $questionProduct            = null;

        $questionProduct                = $request->except(['_token', '_method']);
        if(!$request->status=='on'){
            $questionProduct['status']            = 'off';
        }
        $questionProduct                = $this->questionProduct->create($questionProduct);

        LogActivityHelper::addToLog([
            'module'      => 'questionProduct',
            'action'      => 'create',
            'description' => $request->name
        ]);
        QuestionProduct::flushQueryCache(['question_product']);

        return response()->json(
            [
                'status'   => 'success',
                'message'  => message_module($this->module, 'crud.create_success'),
                'redirect' => route($this->route . 'create'),
                'result'   => array('questionProduct' => $questionProduct)
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
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
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function edit(string $uuid)
    {
        $data['questionProduct'] = $this->questionProduct->getByUuid($uuid);

        return view($this->view . 'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  string  $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function update(UpdateRequest $request, string $uuid)
    {   
        $questionProduct            = null;
        $questionProduct                = $request->except(['_token', '_method']);
        if(!$request->status=='on'){
            $questionProduct['status']            = 'off';
        }
        $questionProduct                = $this->questionProduct->update($questionProduct,$uuid);

        LogActivityHelper::addToLog([
            'module'      => 'questionProduct',
            'action'      => 'edit',
            'description' => $request->name
        ]);
        QuestionProduct::flushQueryCache(['question_product']);

        return response()->json(
            [
                'status'   => 'success',
                'message'  => message_module($this->module, 'crud.edit_success'),
                'redirect' => route($this->route . 'edit', ['questionProduct' => $uuid]),
                'result'   => array('questionProduct' => $questionProduct)
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function destroy(string $uuid)
    {
        $data = $this->questionProduct->getByUuid($uuid);

        LogActivityHelper::addToLog([
            'module'      => 'questionProduct',
            'action'      => 'delete',
            'description' => $data->name,
        ]);

        $result = $this->questionProduct->remove($uuid);
        QuestionProduct::flushQueryCache(['question_product']);

        return response()->json(
            [
                'status'  => 'success',
                'message' => message_module($this->module, 'crud.destroy_success'),
                'result'  => $result
            ], 200);
    }

    public function dataTableIndex()
    {
        $questionProduct = $this->questionProduct->query();

        return Datatables::of($questionProduct)
        ->editColumn('answer', function ($questionProduct) {
            return Str::limit(strip_tags($questionProduct->answer ?? ''), 50);
        })
            ->editColumn('status', function ($questionProduct) {
                if ($questionProduct->status == 'on') {
                    $xhtml = '<span class="badge btn-xs badge-info">' . label('element.status_enable') . '</span>';
                } else {
                    $xhtml = '<span class="badge badge-secondary">' . label('element.status_disable') . '</span>';

                }
                return $xhtml;
            })
            ->addColumn('actions', function ($questionProduct) {
                return view('administrator.modules.questionProduct.actions', ['uuid' => $questionProduct->uuid, 'questionProduct' => $this]);
            })
            ->rawColumns(['actions', 'status'])
            ->addIndexColumn()
            ->make(true);
    }
}
