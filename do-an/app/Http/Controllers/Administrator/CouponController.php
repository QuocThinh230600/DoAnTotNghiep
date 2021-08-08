<?php

namespace App\Http\Controllers\Administrator;

use DateTime;
use Carbon\Carbon;
use App\Http\Resources\Coupon;
use Yajra\DataTables\DataTables;
use App\Helpers\LogActivityHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request; 
use App\Repositories\Coupon\CouponRepository;
use App\Http\Requests\Administrator\coupon\StoreRequest;
use App\Http\Requests\Administrator\coupon\UpdateRequest;

class CouponController extends Controller
{
    private $view = 'administrator.modules.coupon.';

    private $route = 'admin.coupon.';

    private $module = 'module.coupon';

    private $coupon;

    /**
     * ColorController constructor.
     * @param ColorRepository $color
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function __construct(CouponRepository $coupon)
    {
        $this->middleware('permission:coupon_index', ['only' => ['show', 'index', 'dataTableIndex']]);
        $this->middleware('permission:coupon_create', ['only' => ['create', 'store', 'language', 'translation']]);
        $this->middleware('permission:coupon_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:coupon_destroy', ['only' => ['destroy']]);

        $this->coupon = $coupon;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function index()
    {
        if (Request::is('api*')) {
            $coupon = $this->coupon->getAll();
            return new Coupon($coupon);
        }

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
     * @param StoreRequest $request
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except(['_token', '_method','date_start_submit','date_end_submit']);
        $data['status'] = $request->status ?? 'off';
        $data['date_start'] = $request->date_start_submit;
        $data['date_end'] = $request->date_end_submit;
        $data['time_end'] = $request->time_end;

        $result = $this->coupon->create($data);

        LogActivityHelper::addToLog([
            'module' => 'coupon',
            'action' => 'create',
            'description' => $request->name,
        ]);

        return response()->json(
            [
                'status' => 'success',
                'message' => message_module($this->module, 'crud.create_success'),
                'redirect' => route($this->route . 'create'),
                'result' => $result,
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param string $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function show(string $uuid)
    {
        $result = $this->coupon->getByUuid($uuid);

        return response()->json(
            [
                'status' => 'success',
                'result' => $result,
            ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function edit(string $uuid)
    {
        $data['coupon'] = $this->coupon->getByUuid($uuid);

        return view($this->view . 'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param string $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function update(UpdateRequest $request, string $uuid)
    {
        $data = $request->except(['_token', '_method','date_start_submit','date_end_submit']);
        $data['status'] = $request->status ?? 'off';
        $data['date_start'] = $request->date_start_submit;

        $data['date_end'] = $request->date_end_submit;
        $data['time_end'] = $request->time_end;

        $result = $this->coupon->update($data, $uuid);

        LogActivityHelper::addToLog([
            'module' => 'coupon',
            'action' => 'edit',
            'description' => $request->name,
        ]);

        return response()->json(
            [
                'status' => 'success',
                'message' => message_module($this->module, 'crud.edit_success'),
                'redirect' => route($this->route . 'edit', ['coupon' => $uuid]),
                'result' => $result,
            ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function destroy(string $uuid)
    {
        $data = $this->coupon->getByUuid($uuid);

        LogActivityHelper::addToLog([
            'module' => 'coupon',
            'action' => 'delete',
            'description' => $data->name,
        ]);

        $result = $this->coupon->remove($uuid);

        return response()->json(
            [
                'status' => 'success',
                'message' => message_module($this->module, 'crud.destroy_success'),
                'result' => $result,
            ], 200);
    }

    /**
     * Process datatables ajax request.
     * @return mixed
     * @throws \Exception
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function dataTableIndex()
    {
        $district = $this->coupon->query()->whereNull('deleted_at');

        return Datatables::of($district)
        ->editColumn('status', function ($news) {
            $now =  strtotime(Carbon::now()->format('Y-m-d'));
            
            $date = DateTime::createFromFormat('Y-m-d', $news->date_end);
            
            $datediff = strtotime($date->format('Y-m-d'));

            if($news->status == "on")
            {
                if ($datediff >= $now) {
                    $xhtml = '<span class="badge btn-xs badge-info">' . label('coupon.status_eneble') . '</span>';
                } else{
                    $xhtml = '<span class="badge badge-warning">' . label('coupon.status_time') . '</span>';
                }
            }else{
                $xhtml = '<span class="badge badge-secondary">' . label('coupon.status_disblade') . '</span>';
            }
            return $xhtml;
        })
            ->addColumn('actions', 'administrator.modules.coupon.actions')
            ->rawColumns(['status', 'actions'])
            ->addIndexColumn()
            ->make(true);
    }
}
