<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PropertySearchRequest extends FormRequest
{
    // public function authorize(): bool
    // {
    //     return request()->user()->can('bookings-manage');
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "adults" => "nullable|integer",
            "children" => "nullable|integer"
        ];
    }
}
