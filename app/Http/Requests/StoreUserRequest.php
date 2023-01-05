<?php

namespace App\Http\Requests;

use Doctrine\Inflector\Rules\French\Rules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'fullname' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }
}
