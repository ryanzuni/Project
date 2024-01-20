<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class aboutRequest extends FormRequest
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
        switch($this->method()) {
            case 'POST' : {
                return [
                    'title' => 'required',
                    'excerpt' => 'required',
                    'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
                    'description' => 'required',
                    'category_id' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'title' => 'required',
                    'excerpt' => 'required',
                    'image' => ['image', 'mimes:png,jpg,jpeg'],
                    'description' => 'required',
                    'category_id' => 'required'
                ];
            }
            
        }
    }
    public function messages(): array
    {
        return [
            'title.required'    => '* The title field is required.',
            'excerpt.required'  => '* The excerpt field is required.',
            'image.required'    => '* The image field is required.',
            'image.image'       => '* The image must be a valid image file.',
            'image.mimes'       => '* The image must be of type: png, jpg, jpeg.',
            'description.required' => '* The description field is required.',
            'category_id.required' => '* The category field is required.',
        ];
    }
}
