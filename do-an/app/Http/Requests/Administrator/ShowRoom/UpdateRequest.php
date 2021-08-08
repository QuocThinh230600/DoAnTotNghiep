<?php

namespace App\Http\Requests\Administrator\ShowRoom;

use App\Repositories\ShowRoom\ShowRoomRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * @var ShowRoomRepository
     */
    protected $showRoom;

    /**
     * UpdateRequest constructor.
     * @param ShowRoomRepository $showRoom
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
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $id = $this->showRoom->getIdByUuid($this->route('showRoom'));

        return [
            'name'          => ['bail', 'required'],
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
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
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
