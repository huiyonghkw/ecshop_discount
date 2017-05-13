<?php

namespace App\Http\Requests\Web\Goods;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'goodses' => 'required'
        ];
    }


    /**
     * Custom the field message
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ' :attribute 不能为空'
        ];
    }

    /**
     * 描述
     * @return array
     */
    public function attributes()
    {
        return [
            'goodses' => '购物车商品'
        ];
    }
}
