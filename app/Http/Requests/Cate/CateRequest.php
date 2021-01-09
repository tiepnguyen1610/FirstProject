<?php

namespace App\Http\Requests\Cate;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'txtCatName' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'txtCatName.required' => 'Bạn chưa nhập tên danh mục',
        ];
    }
}
