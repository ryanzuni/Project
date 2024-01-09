<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PengunjungRequest extends FormRequest
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
                    'total' => 'required',
                    'type_r2' => 'required',
                    'type_r4' => 'required',
                    'date' => 'required',
                    //'bulan' => 'required',
                    ];
            }
            case 'PUT':
            case 'PATCH': {
                return [
                    'total' => 'required',
                    'type_r2' => 'required',
                    'type_r4' => 'required',
                    'date' => 'required',
                    //'bulan' => 'required',
                    ];
            }
        }
    }
}
