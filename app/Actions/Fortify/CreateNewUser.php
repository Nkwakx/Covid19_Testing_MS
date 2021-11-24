<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'idNo' => $data['idNo'] ?? NULL,
            'surname' => $data['surname'] ?? NULL,
            'gender' => $data['gender'] ?? NULL,
            'phone' => $data['phone'] ?? NULL,
            'addressLine1' => $data['addressLine1'] ?? NULL,
            'addressLine2' => $data['addressLine2'] ?? NULL,
            'city_id' => $data['city_id'] ?? NULL,
            'suburb_id' => $data['suburb_id'] ?? NULL,
            'zipcode' => $data['zipcode'] ?? NULL,
            'security_question_id' => $data['security_question_id'] ?? NULL,
            'security_answer' => $data['security_answer'] ?? NULL,
        ]);
    }
}
