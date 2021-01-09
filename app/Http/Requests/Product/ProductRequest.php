<?php

namespace App\Http\Requests\Product;

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
            'slrCategory'   => 'required',
            'txtProName'    => 'required',
            'txtUnitPrice'  => 'required',
            'fImage'        => 'required|image|max:2048'
        ];
    }

    public function messages()
    {
        return [

            'slrCategory.required' => 'Vui lòng chọn danh mục!',
            'txtProName.required'  => 'Vui lòng nhập tên sản phẩm!',
            'txtUnitPrice.required'=> 'Giá tiền chưa được nhập!',
            'fImage.required'      => 'Vui lòng chọn ảnh.' ,
            'fImage.image'         => 'File không đúng định dạng', 
            'fImage.max'           => 'File kích thước vượt quá cho phép' 
        ];
    }

}
