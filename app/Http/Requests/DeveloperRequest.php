<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperRequest extends FormRequest
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
            'name' => ['required'],
            'address' =>[ 'required'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'zipcode' => ['nullable'],
            'email' => ['email'],
            'phone' => ['nullable','string','min:6','max:20'],
            'whatsapp' => ['nullable','string','min:6','max:20'],
            'url' => ['nullable','url:http,https'],
            'short_description' => ['nullable','max:1000'],
            'long_description' => ['nullable'],
            'image' => ['image','mimes:jpg,jpeg,png,gif,bmp,svg','max:2048'],
            'brochure' => ['file','mimes:doc,docx,pdf','max:4096'],
            'speciality' => ['nullable','array'],
            'social_networks' => ['nullable'],
            'status' => ['required','in:enabled,disabled'],
        ];
    }
}
