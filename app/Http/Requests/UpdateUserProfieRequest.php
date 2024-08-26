<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule as ValidationRule;

class UpdateUserProfieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows("edit-update-profile",$this->user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required',ValidationRule::unique('users')->ignore($this->user)],
            'bio' => 'nullable',
            'image' => 'image',
            'name' => 'required',
            'email' => ['required','email'],
            'password' => ['min:8','nullable' ,'confirmed'],
        ];
    }
}
