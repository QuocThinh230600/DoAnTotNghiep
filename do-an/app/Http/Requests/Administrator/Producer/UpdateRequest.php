<?php

namespace App\Http\Requests\Administrator\Producer;

use App\Repositories\Producer\ProducerRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    protected $producer;

    /**
     * TranslationRequest constructor.
     * @param ProducerRepository $producer
     */
    public function __construct(ProducerRepository $producer)
    {
        parent::__construct();
        $this->producer = $producer;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @author 
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * @author 
     */
    public function rules()
    {
        $id = $this->producer->getIdByUuid($this->route('producer'));

        return [
            'name'  => ['bail', 'required', 'unique:producers_translations,name,' . $id . ',id,deleted_at,NULL'],
            'image' => ['required'],
            'address'   => ['required'],
            'phone'     => ['required'],
            'email'     => ['required'],
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array
     * @author 
     */
    public function messages()
    {
        return [
            //
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     * @author 
     */
    public function attributes()
    {
        return [
            'name'  => attr('producer.name'),
            'image' => attr('producer.image'),
            'address'   => attr('producer.address'),
            'phone'     => attr('producer.phone'),
            'email'     => attr('producer.email'),
        ];
    }
}
