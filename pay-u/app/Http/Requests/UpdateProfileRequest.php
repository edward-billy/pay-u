<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        $rules = [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ],
            'role' => [
                'required',
                'string', Rule::in(['kasir', 'manager'])
            ],
        ];

        if ($this->input('role') === 'manager') {
            $rules['authorization_password'] = [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, '$2y$10$oAsqGkY8MeZHyM7M7Wkp6uFg.VSKTNatQOyyPXBtKOwOJxdL52YHK')) {
                        $fail(__('The authorization password is incorrect.'));
                    }
                },
            ];
        }

        return $rules;
    }

}
