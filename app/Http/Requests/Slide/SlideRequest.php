<?php

namespace App\Http\Requests\Slide;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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

            'txtSlideName' => 'required',
            'slide' => 'required|image|max:2048'
        ];
    }

    public function messages()
    {
        return [

            'txtSlideName.required' => 'Vui lòng nhập tên slide!',
            'slide.required' => 'Bạn chưa chọn ảnh!',
            'slide.image' => 'File not image!',
            'slide.max' => 'Kích thước file quá lớn!'
        ];
    }
}
