<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePosts extends FormRequest
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
             // dinh. nghia cac' luat. rang buoc. du lieu. tu form gui len
            // khong duoc. phep trong max = 100 ky tu'
            'titlePost' => 'required|max:100',
            'sapoPost' => 'required|max:180',
            'language' => 'required|numeric',
            'categories' => 'required|numeric',
            'contentPost' => 'required',
        ];
    }
    // thong bao error ra ngoai trinh` duyet.

    public function messages(){
        return [
            'titlePost.required' => ':attribute Khong duoc trong',
            'titlePost.max' => ':attribute khong lon hon :max ki tu',
            'sapoPost.required' => ':attribute Khong duoc trong',
            'sapoPost.max' => ':attribute khong lon hon :max ki tu',
            'language.required' => ':attribute Khong duoc trong',
            'language.numeric' => 'Vui long dung ngon ngu',
            'categories.required' => ':attribute Khong duoc trong',
            'categories.numeric' => 'Khong duoc de trong',
            'contentPost.required' => ':attribute Khong duoc trong',
        ];
    }
}
