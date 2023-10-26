<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevelopRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'dtype_id' => ['required'],
            'address' =>'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'nullable',
            'description' => 'string',
            'details' => 'string',
            'payment_modes' => 'string',
            'amenities_ext' => 'string',
            'status' => 'required|in:published,hidden',
        ];
    }
}
