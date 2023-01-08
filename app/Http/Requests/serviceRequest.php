<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class serviceRequest extends FormRequest
{
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
    public function rules()
    {
        return [
             'name_ar' => 'required|string|min:2',
             'name_en' => 'required|string|min:2',
             'description_en' => 'required|string',
             'description_ar' => 'required|string',
             'icon' => 'image',
             'image' => 'image',
        ];
    }
}
