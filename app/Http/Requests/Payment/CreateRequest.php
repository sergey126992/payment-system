<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CreateRequest extends FormRequest
{
    public function wantsJson()
    {
        return true;
    }

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
            'service_id' => 'required',
            'phone' => 'required|string|min:5|max:32',
            'amount' => 'required|integer',
            'description' => 'string|min:10|max:70',
            'external_id' => 'string|min:1|max:256',
            'success_message' => 'string|min:10|max:256',
            'custom_data' => 'string|min:1|max:256',
            'signature' => 'required|max:32',
        ];
    }
}
