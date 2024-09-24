<?php

namespace App\Http\Requests\Apps;

use Illuminate\Foundation\Http\FormRequest;

class AppConfigRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "app_id" => "required|exists:apps,id",
            "is_active" => "boolean|required",
            "config" => "array|required",
        ];
    }
}
