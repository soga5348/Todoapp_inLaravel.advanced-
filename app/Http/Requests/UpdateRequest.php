<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    

     public function rules(): array
     {
         return [
             'content_update' => 'required|max:20',
             
         ];
     }
public function messages()
{
    return[
        'content_update.required' => '・タスクを入力してください',
        'content_update.max' => '・タスクは20文字以内で入力してください。',
        
    ];
}
}