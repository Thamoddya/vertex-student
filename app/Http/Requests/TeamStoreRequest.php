<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Name'=>'required',
            'username'=>'required',
            'email'=>'required|email|unique:users,email',
            'mobile'=>'required|min:10|unique:users,mobile',
            'password'=>'required',
            'role_id'=>'required',
        ];
    }
}
