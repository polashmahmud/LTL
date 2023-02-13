<?php

namespace App\Http\Requests\Account;

use App\Rules\CurrentEmail;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmailRequest extends FormRequest
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
            'current_email' => ['required', new CurrentEmail],
            'email' => 'required|email|confirmed|unique:users,email',
        ];
    }
}
