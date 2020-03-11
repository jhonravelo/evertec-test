<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

        switch ($this->method()) {
            case 'PUT':
                # code...
                return [
                    "customer_name" => "required",
                    "customer_email" => "required|email",
                    "customer_mobile" => "required",
                    "detail.product_id" => "required",
                    "detail.product_value" => "required",
                    "detail.quantity" => "required",
                    "detail.total_value" => "required"
                ];
            
            case 'POST':
                # code...
                return  [
                    "customer_name" => "required",
                    "customer_email" => "required",
                    "customer_mobile" => "required",
                    "detail.product_id" => "required",
                    "detail.product_value" => "required",
                    "detail.quantity" => "required",
                    "detail.total_value" => "required"
                ];
        }
    }
}
