<?php

namespace App\Http\Controllers\Administrator;

use App\Models\ShowRoom;
use Yajra\DataTables\DataTables;
use App\Helpers\LogActivityHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Repositories\ShowRoom\ShowRoomRepository;
use App\Http\Resources\ShowRoom as ShowRoomResource;
use App\Http\Requests\Administrator\ShowRoom\StoreRequest;
use App\Http\Requests\Administrator\ShowRoom\UpdateRequest;

class ShowRoomController extends Controller
{
    private $view   = 'administrator.modules.show_room.';

    private $route  = 'admin.showRoom.';

    private $module = 'module.showRoom';

    private $showRoom;

   /**
     * ProducerController constructor.
     * @param ProducerRepository $producer
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function __construct(ShowRoomRepository $showRoom)
    {

        $this->middleware('permission:showRoom_index', ['only' => ['show', 'index', 'dataTableIndex']]);
        $this->middleware('permission:showRoom_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:showRoom_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:showRoom_destroy', ['only' => ['destroy']]);
        $this->showRoom            = $showRoom;
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
     * @param StoreRequest $request
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function store(StoreRequest $request)
    {
        $showRoom            = null;

        $showRoom                = $request->except(['_token', '_method']);
        $showRoom['locale']      = config('app.locale');
        $showRoom['user_id']     = auth()->user()->id;
        if(!$request->status=='on'){
            $showRoom['status']            = 'off';
        }
        $showRoom                = $this->showRoom->create($showRoom);
        ShowRoom::flushQueryCache(['show_rooms']); 
        LogActivityHelper::addToLog([
            'module'      => 'showRoom',
            'action'      => 'create',
            'description' => $request->name
        ]);

        return response()->json(
            [
                'status'   => 'success',
                'message'  => message_module($this->module, 'crud.create_success'),
                'redirect' => route($this->route . 'create'),
                'result'   => array('showRoom' => $showRoom)
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
        $data = $this->showRoom->getByUuid($uuid);

        return response()->json(
            [
                'status' => 'success',
                'result' => $data
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
        $data['showRoom'] = $this->showRoom->getByUuid($uuid);

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
        $showRoom            = null;
        $showRoom                = $request->except(['_token', '_method']);
        $showRoom['locale']      = config('app.locale');
        $showRoom['user_id']     = auth()->user()->id;
        if(!$request->status=='on'){
            $showRoom['status']            = 'off';
        }
        $showRoom                = $this->showRoom->update($showRoom,$uuid);
        ShowRoom::flushQueryCache(['show_rooms']);

        LogActivityHelper::addToLog([
            'module'      => 'showRoom',
            'action'      => 'edit',
            'description' => $request->name
        ]);

        return response()->json(
            [
                'status'   => 'success',
                'message'  => message_module($this->module, 'crud.edit_success'),
                'redirect' => route($this->route . 'edit', ['showRoom' => $uuid]),
                'result'   => array('showRoom' => $showRoom)
            ], 200);
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
        $data = $this->showRoom->getByUuid($uuid);

        LogActivityHelper::addToLog([
            'module'      => 'showRoom',
            'action'      => 'delete',
            'description' => $data->name,
        ]);

        $result = $this->showRoom->remove($uuid);
        ShowRoom::flushQueryCache(['show_rooms']);

        return response()->json(
            [
                'status'  => 'success',
                'message' => message_module($this->module, 'crud.destroy_success'),
                'result'  => $result
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
        $showRoom = $this->showRoom->query();

        return Datatables::of($showRoom)

            ->editColumn('status', function ($showRoom) {
                if ($showRoom->status == 'on') {
                    $xhtml = '<span class="badge btn-xs badge-info">' . label('element.status_enable') . '</span>';
                } else {
                    $xhtml = '<span class="badge badge-secondary">' . label('element.status_disable') . '</span>';

                }
                return $xhtml;
            })
            ->addColumn('actions', function ($showRoom) {
                return view('administrator.modules.show_room.actions', ['uuid' => $showRoom->uuid, 'showRoom' => $this]);
            })
            ->rawColumns(['actions', 'status'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Number of languages ​​remaining after the data has been created
     * @param string $uuid
     * @return array
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function translateRemaining(string $uuid): array
    {
        $id = $this->producer->getIdByUuid($uuid);

        $totalLanguage      = $this->language->countRow();
        $languageTranslated = $this->producerTranslation->getTotalTranslated('producer_id', $id);
        $languageRemaining  = "<span class='pl-1'>($languageTranslated/$totalLanguage)</span>";

        $totalLocale      = $this->language->getAllLocale()->toArray();
        $localeTranslated = $this->producerTranslation->getLocaleTranslated('producer_id', $id)->toArray();
        $localeRemaining  = array_diff($totalLocale, $localeTranslated);

        return [
            'language' => $languageRemaining,
            'locale'   => $localeRemaining,
            'full'     => $languageTranslated == $totalLanguage
        ];
    }

    /**
     * Display language translation template
     * @param string $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function language(string $uuid)
    {
        $data['producer'] = $this->producer->getByUuid($uuid);

        $locale_current[]          = app()->getLocale();
        $data['languages_current'] = $this->language->getLanguageByLocale($locale_current);

        $translated_remaining        = $this->translateRemaining($uuid);
        $locale_remaining            = $translated_remaining['locale'];
        $data['languages_remaining'] = $this->language->getLanguageByLocale($locale_remaining);

        return view($this->view . 'translation', $data);
    }

    /**
     * Proceed with language translation
     * @param TranslationRequest $request
     * @param string $uuid
     * @return mixed
     * @author Quốc Tuấn <contact.quoctuan@gmail.com>
     */
    public function translation(TranslationRequest $request, string $uuid)
    {
        $producer                = $request->only('name', 'address', 'phone', 'email', 'description', 'locale');
        $producer['producer_id'] = $this->producer->getIdByUuid($uuid);

        $result = $this->producerTranslation->create($producer);

        $translated_remaining = $this->translateRemaining($uuid);

        LogActivityHelper::addToLog([
            'module'      => 'producer',
            'action'      => 'translation',
            'description' => $request->name_origin . " - " . $request->name,
        ]);

        if ($translated_remaining["full"]) {
            return response()->json(
                [
                    'status'   => 'success',
                    'message'  => message('language.update_full_language'),
                    'redirect' => route($this->route . 'index'),
                    'result'   => $result
                ], 201);
        } else {
            return response()->json(
                [
                    'status'   => 'success',
                    'message'  => message_module($this->module, 'crud.translate_success'),
                    'redirect' => route($this->route . 'producer', ['producer' => $uuid]),
                    'result'   => $result
                ], 201);
        }
    }
}
