<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSinhvienRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|string|max:50',
            'age' => 'required|integer',
            'MSSV' => 'required|string|max:225',
        ];
    }

    public function messages():array {
        return[
            'name.required' => 'Tên không hợp lệ!',
            'age.required' => 'Tuổi không hợp lệ!',
            'MSSV.required' => 'MSSV không hợp lệ!',
        ];
    }
}
