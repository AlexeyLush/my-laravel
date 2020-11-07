<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'model' => 'required|max:255',
            'color' => 'required|max:255',
            'year' => 'nullable|integer|between:1990, 2020',
            'engine' => 'required|max:255',
            'image' => 'nullable|image'
        ];
    }
}
