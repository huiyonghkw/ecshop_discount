<?php

namespace App\Http\Requests\Web\ShoppingCart;

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
            // 'quantity' => 'required|integer',
            // 'goods_id' => 'required'
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
            'required' => ' :attribute 不能为空',
            'integer' => ': attribute 只能为数字',
        ];
    }

    /**
     * 描述
     * @return array
     */
    public function attributes()
    {
        return [
            'quantity' => '购买数量',
            'goods_id' => '商品ID'
        ];
    }
}
