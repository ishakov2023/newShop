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
            'nameNew' => 'bail|required|string|max:255|unique:products,name',
            'descriptionNew' => 'required|string|max:255',
            'priceNew' => 'required|string|max:255',
            'amountNew' => 'required|string|max:255',
            'categoryIdNew' => 'required|string|max:255',

        ];
    }
}
