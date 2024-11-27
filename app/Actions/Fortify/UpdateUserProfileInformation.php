<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        // Validate input, including address
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'employee_no' => ['required', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:Male,Female'],
            'marital_status' => ['nullable', 'in:Single,Married,Separated,Divorced,Widowed'],
            'address' => ['nullable', 'string', 'max:255'], // Validation for address
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        // Handle photo update if provided
        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // Update verified user if needed
        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // Save the user's updated information including address
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'employee_no' => $input['employee_no'],
                'birthdate' => $input['birthdate'],
                'gender' => $input['gender'],
                'marital_status' => $input['marital_status'],
                'address' => $input['address'], // Save address to the database
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  User  $user
     * @param  array<string, mixed>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        // Update user information for verified users
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'employee_no' => $input['employee_no'],
            'birthdate' => $input['birthdate'],
            'gender' => $input['gender'],
            'marital_status' => $input['marital_status'],
            'address' => $input['address'], // Save address to the database
            'email_verified_at' => null,
        ])->save();

        // Send verification email if needed
        $user->sendEmailVerificationNotification();
    }
}
