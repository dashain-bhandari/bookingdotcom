<?php

namespace App\Http\Requests\Owner;

use App\Models\City;
use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize()
    // {
    //    return $this->user()->can('store', Property::class);
    // }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required",
            "city_id" => ["required", 'exists:cities,id'],
            "address_street" => "required"
        ];
    }
}
