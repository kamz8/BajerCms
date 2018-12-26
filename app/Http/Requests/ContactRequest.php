<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'nameAndSurname' => 'required|min:5',
            'email' => 'required|email',
            'phone' => 'required|phone:AUTO,PL',
            'message' => 'required|min:25'
        ];
    }
}
