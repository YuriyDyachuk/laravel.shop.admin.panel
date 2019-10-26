<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminOrderSaveRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => 'min:5|max:200',
        ];
    }

    public function messages()
    {
        return [
            'comment.min' => 'Минимальная длина символов = 5',
            'comment.max' => 'Максимальная длина символов = 200',
        ];
    }
}
