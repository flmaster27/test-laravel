<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvertRequest extends FormRequest
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
            'currency_from' => 'required|exists:currencies,name',
            'currency_to' => 'required|different:currency_from|exists:currencies,name',
            'value' => 'required|numeric|min:0.01',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!in_array('BTC', [$this->currency_from, $this->currency_to])) {
                $validator->errors()->add('currency_from', 'You must convert from or to BTC');
            }
        });
    }
}
