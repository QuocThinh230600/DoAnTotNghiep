<?php

namespace App\Http\Controllers\Administrator;

use App\Models\Province;
use Yajra\DataTables\DataTables;
use App\Helpers\LogActivityHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Repositories\Province\ProvinceRepository;
use App\Http\Requests\Administrator\Province\StoreRequest;
use App\Http\Requests\Administrator\Province\UpdateRequest;

class ProvinceController extends AdminController
{
    private $view = 'administrator.modules.province.';

    private $route = 'admin.province.';

    private $module = 'module.province';

    private $province;

    /**
     * ProvinceController constructor.
     * @param ProvinceRepository $province
     * @author 
     */
    public function __construct(ProvinceRepository $province)
    {
        parent::__construct();
        $this->middleware('permission:province_index', ['only' => ['show', 'index', 'dataTableIndex']]);
        $this->middleware('permission:province_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:province_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:province_destroy', ['only' => ['destroy']]);
        $this->province = $province;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     * @author 
     */
    public function index()
    {
        if (Request::is('api*')) {
            $province = $this->province->getAll();
            return new Province($province);
        }

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
     * @param StoreRequest $request
     * @return mixed
     * @author 
     */
    public function store(StoreRequest $request)
    {
        $data             = $request->except(['_token', '_method']);
        $data['status']   = $request->status ?? 'off';
        $data['featured'] = $request->default ?? 'off';
        $result           = $this->province->create($data);
        Province::flushQueryCache(['provinces']); 

        LogActivityHelper::addToLog([
            'module'      => 'province',
            'action'      => 'create',
            'description' => $request->name
        ]);

        return response()->json(
            [
                'status'   => 'success',
                'message'  => message_module($this->module, 'crud.create_success'),
                'redirect' => route($this->route . 'create'),
                'result'   => $result
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return mixed
     * @author 
     */
    public function show(int $id)
    {
        $result = $this->province->getById($id);

        return response()->json(
            [
                'status' => 'success',
                'result' => $result
            ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return mixed
     * @author 
     */
    public function edit(int $id)
    {
        $data['province'] = $this->province->getById($id);

        return view($this->view . 'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return mixed
     * @author 
     */
    public function update(UpdateRequest $request, int $id)
    {
        $data             = $request->except(['_token', '_method']);
        $data['status']   = $request->status ?? 'off';
        $data['featured'] = $request->featured ?? 'off';
        $result           = $this->province->update($data, $id, false);
        Province::flushQueryCache(['provinces']); 

        LogActivityHelper::addToLog([
            'module'      => 'province',
            'action'      => 'edit',
            'description' => $request->name
        ]);

        return response()->json(
            [
                'status'   => 'success',
                'message'  => message_module($this->module, 'crud.edit_success'),
                'redirect' => route($this->route . 'edit', ['province' => $id]),
                'result'   => $result
            ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return mixed
     * @author 
     */
    public function destroy(int $id)
    {
        $data = $this->province->getById($id);

        LogActivityHelper::addToLog([
            'module'      => 'province',
            'action'      => 'delete',
            'description' => $data->name
        ]);

        $result = $this->province->remove($id, false);
        Province::flushQueryCache(['provinces']); 

        return response()->json(
            [
                'status'  => 'success',
                'message' => message_module($this->module, 'crud.destroy_success'),
                'result'  => $result,
            ], 200);
    }

    /**
     * Process datatables ajax request.
     * @return mixed
     * @throws \Exception
     * @author 
     */
    public function dataTableIndex()
    {
        $province = $this->province->query();

        return Datatables::of($province)
            ->editColumn('status', function ($province) {
                if ($province->status == 'on') {
                    $xhtml = '<span class="badge btn-xs badge-info">' . label('element.status_enable') . '</span>';
                } else {
                    $xhtml = '<span class="badge badge-secondary">' . label('element.status_disable') . '</span>';

                }
                return $xhtml;
            })
            ->editColumn('fee', function ($province) {
                return number_format($province->fee). 'đ';
            })
            ->addColumn('actions', 'administrator.modules.province.actions')
            ->rawColumns(['status', 'actions'])
            ->addIndexColumn()
            ->make(true);
    }
}
