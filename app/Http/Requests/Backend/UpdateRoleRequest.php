<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'name'          => 'required|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:roles,slug' . $this->role->id,
            'permissions'   => 'required|array',
            'permissions.*' => 'required|integer|exists:permissions,id',
            'deletable'     => 'nullable|boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required'          => 'Role name is required',
            'name.string'            => 'Role name must be a string',
            'name.max'               => 'Role name must be less than 255 characters',
            'slug.required'          => 'Role slug is required',
            'slug.string'            => 'Role slug must be a string',
            'slug.max'               => 'Role slug must be less than 255 characters',
            'slug.unique'            => 'Role slug must be unique',
            'permissions.required'   => 'Role permissions are required',
            'permissions.array'      => 'Role permissions must be an array',
            'permissions.*.required' => 'Role permissions are required',
            'permissions.*.integer'  => 'Role permissions must be an integer',
            'permissions.*.exists'   => 'Role permissions must exist',
            'deletable.required'     => 'Role deletable is required',
            'deletable.boolean'      => 'Role deletable must be a boolean',
        ];
    }
}
