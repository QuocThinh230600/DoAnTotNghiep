<?php

namespace App\Http\Requests\Administrator\Image;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
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
        return [
            'name'        => ['bail', 'required', 'unique:images_translations,name,NULL,id,deleted_at,NULL'],
            'position_id' => ['required', 'exists:positions,id'],
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
            'name'        => attr('images_position.name'),
            'position'    => attr('images_position.position'),
            'position_id' => attr('images_position.position_id'),
        ];
    }
}
