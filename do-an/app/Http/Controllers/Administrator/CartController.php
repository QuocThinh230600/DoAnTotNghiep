<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\LogActivityHelper;
use App\Repositories\Cart\PaydetailsRepository;
use App\Repositories\Cart\PayorderRepository;
use Yajra\DataTables\DataTables;

class CartController extends AdminController
{
    private $view = 'administrator.modules.cart.';

    private $route = 'admin.cart.';

    private $module = 'module.cart';

    private $payorder;

    private  $paydetail;

    /**
     * ConfigController constructor.
     * @param ConfigRepository $config
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function __construct(PaydetailsRepository $paydetail,PayorderRepository $payorder)
    {
        parent::__construct();
        $this->middleware('permission:cart_index', ['only' => ['show', 'index', 'dataTableIndex']]);
        $this->middleware('permission:cart_create', ['only' => ['create', 'store', 'language', 'translation']]);
        $this->middleware('permission:cart_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cart_destroy', ['only' => ['destroy']]);

        $this->payorder = $payorder;
        $this->paydetail = $paydetail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function index()
    {
        // $payorder['fullname']= "Đinh A";
        // $payorder['email']= "dinh123@gmail.com";
        // $payorder['address']= "TP Hồ Chí minh";
        // $payorder['phone']= "0123456789";
        // $payorder['name_receive']= "Đinh B";
        // $payorder['phone_receive']= "0987654321";
        // $payorder['note']= "aaaaaaaaaaaaaaaaaaa";
        // $payorder['coupon_id']= "1";
        // $payorder['total']= "1000000";
        // $payorder['fee']= "30000";
        // $payorder                    = $this->payorder->create($payorder);


        // $paydetail['payorders_id']= "1";
        // $paydetail['product_id']= "7";
        // $paydetail['quantity']= "2";
        // $paydetail['price']= "100000";
        // $paydetail['total']= "200000";
        // $paydetail['attribute']= "0987654321";
        // $paydetail                    = $this->paydetail->create($paydetail);

        // $paydetail['payorders_id']= "1";
        // $paydetail['product_id']= "8";
        // $paydetail['quantity']= "2";
        // $paydetail['price']= "200000";
        // $paydetail['total']= "400000";
        // $paydetail['attribute']= "0987654321";
        // $paydetail                    = $this->paydetail->create($paydetail);
        return view($this->view . 'index');
    }

    public function show(string $uuid)
    {
        $data['order'] = $this->payorder->getByUuid($uuid);
        $id             = $this->payorder->getIdByUuid($uuid);
        $data['id']=$id;
        $data['orderdetail']= $this->paydetail ->getOrderdetailRecursive($id);
        return view($this->view . 'show',$data);
    }
 
   /**
     * Process datatables ajax request.
     * @param string $pageUuid
     * @return mixed
     * @throws \Exception
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function dataTableIndex()
    {

        $payorder = $this->payorder->getAll();
        return Datatables::of($payorder)
            
            ->editColumn('status', function ($payorder) {
                if ($payorder->status == 1) {
                    $xhtml = '<span class="badge badge-info">' . label('status_cart.pending') . '</span>';
                } elseif($payorder->status == 2) {
                    $xhtml = '<span class="badge btn-xs badge-success">' . label('status_cart.success') . '</span>';
                }elseif($payorder->status == 3) {
                    $xhtml = '<span class="badge bg-warning text-dark">' . label('status_cart.delevery') . '</span>';
                }elseif($payorder->status == 4) {
                    $xhtml = '<span class="badge badge-primary">' . label('status_cart.success_delevery') . '</span>';
                }else {
                    $xhtml = '<span class="badge badge-danger">' . label('status_cart.cancel') . '</span>';
                }      
                return $xhtml;
            })
            ->editColumn('note', function ($payorder) {
                return $payorder->note;
            })
            ->editColumn('total', function ($payorder) {
                return number_format($payorder->total).'đ';
            })
            ->editColumn('fee', function ($payorder) {
                return number_format($payorder->fee).'đ';
            })
            ->editColumn('payment_method', function ($payorder) {
                foreach (payment_method() as $item) {
                    if($payorder->payment_method == $item->id){
                        return $item->name;
                    }
                }
                return null;
            })
            ->addColumn('actions', function ($payorder) {
                return view('administrator.modules.cart.actions', ['uuid'    => $payorder->uuid, 'cart' => $this, 'status'=> $payorder->status]);
            })
            ->rawColumns(['status', 'actions','note','payment_method'])
            ->addIndexColumn()
            ->make(true);
    }

    public function change_status_order($uuid, $status){
        switch ($status) {
            case 1:
                $payorder['status']=1;
            break;
            case 2:
                $payorder['status']=2;
            break;
            case 3:
                $payorder['status']=3;
            break;
            case 4:
                $payorder['status']=4;
            break;
            case 5:
                $payorder['status']=5;
            break;
        }
       
        $payorder['user_id']=auth()->user()->id;
        $payorder= $this->payorder->update($payorder, $uuid);
        return back();
    }
}
