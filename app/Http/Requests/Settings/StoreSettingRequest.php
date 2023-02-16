<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'app_name'        => 'required|string|max:255',
            'app_description' => 'nullable|string|max:255',
            'app_logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=300,min_height=90',
            'app_favicon'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
