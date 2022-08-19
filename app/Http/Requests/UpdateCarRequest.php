<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // same validation rules as store
            'code'=> ['min:3','max:20','required'],
            'manufacturer'=> ['min:2','max:20','required'],
            'model'=> ['min:0','max:20','required'],
            'price'=> [],
        ];
    }
}
