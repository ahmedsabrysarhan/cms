<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
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
            'name' => ['required','unique:categories'] 
        ];
    }

    // Set customise Messages
    public function messages(){
    return [
        'name.required' => 'A Category name is required',
        'name.unique' => 'A Category name must be Unique',
        ];
    }

    // Prepare the data for validation Sanitize adata 
    // protected function prepareForValidation(){
    // $this->merge([
    //     'name' => Str::slug($this->name),
    //     ]);
    // }
}
