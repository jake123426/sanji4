<?php

namespace App\Actions\Fortify;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        /* return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]); */

        $User = new User();
        $User->name = $input['name'];
        $User->email = $input['email'];
        $User->password = Hash::make($input['password']);
        $User->status = true;
        $User->save();
        $User->assignRole('basico');
      
        $perfil = new Perfil();
        $perfil->user_id = $User->id;
        $perfil->save();

        return $User;
    }
}
