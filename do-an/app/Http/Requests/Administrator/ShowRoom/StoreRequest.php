<?php

namespace App\Http\Requests\Administrator\ShowRoom;

use App\Repositories\ShowRoom\ShowRoomRepository;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * @var ShowRoomRepository
     * @author Quoc Tuan
     */
    protected $showRoom;

    /**
     * StoreRequest constructor.
     * @param ShowRoomRepository $showRoom
     * @author Quoc Tuan
     */
    public function __construct(ShowRoomRepository $showRoom)
    {
        parent::__construct();
        $this->showRoom = $showRoom;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @author Quoc Tuan
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author Quoc Tuan
     */
    public function rules()
    {
        return [
            'name'          => ['bail', 'required', 'unique:show_rooms,name,NULL,id,deleted_at,NULL'],
            'image'         => ['required'],
            'address'       => ['required'],
            'phone'         => ['required'],
            'description'   => ['required'],
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     * @author Quoc Tuan
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     * @author Quoc Tuan
     */
    public function attributes()
    {
        return [
            'name'          => attr('showRoom.name'),
            'image'         => attr('showRoom.image'),
            'address'       => attr('showRoom.address'),
            'phone'         => attr('showRoom.phone'),
            'description'   => attr('showRoom.description'),
        ];
    }
}
