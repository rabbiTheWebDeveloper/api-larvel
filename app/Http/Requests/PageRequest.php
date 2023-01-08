<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Request;

class PageRequest extends FormRequest
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
        if(Request::route()->getName() === "client.page.store"){
            return [
                'title' => 'required|string|max:255',
                'theme' => 'required|integer',
                'status' => 'required|integer',
                'page_content' => 'nullable',
            ];
        }

        if(Request::route()->getName() === "client.page.update"){
            return [
                'title' => 'required|string|max:255',
                'theme' => 'required|integer',
                'status' => 'required|integer',
                'page_content' => 'nullable',
            ];
        }

        
        return [];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'success' => false,
                'msg'  => $validator->errors(),
            ], 400));
    }
}
