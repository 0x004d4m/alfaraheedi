<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar' => 'required|min:1|max:255',
            'name_en' => 'required|min:1|max:255',
            'description_ar' => 'required|min:1|max:255',
            'description_en' => 'required|min:1|max:255',
            'price' => 'required|min:1|max:255',
            'tax' => 'required|min:1|max:255',
            'isbn' => 'required|min:1|max:255',
            'image1' => 'required',
            'image2' => 'nullable',
            'image3' => 'nullable',
            'stock' => 'required',
            'category_id' => 'required',
            'authour_id' => 'nullable',
            'publisher_id' => 'nullable',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
