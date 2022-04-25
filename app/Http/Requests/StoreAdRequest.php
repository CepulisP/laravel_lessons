<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
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
                'title' => 'required|max:255',
                'content' => 'required',
                'price' => 'required|numeric',
                'years' => 'required|numeric',
                'image' => 'required|max:255',
                'vin' => 'required|min:11|max:17',
                'type_id' => 'required|numeric',
                'color_id' => 'required|numeric'
        ];
    }
}
