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
        // Validate input, including new fields
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'employee_no' => ['required', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
            'gender' => ['nullable', 'in:Male,Female'],
            'marital_status' => ['nullable', 'in:Single,Married,Separated,Divorced,Widowed'],
            'address' => ['nullable', 'string', 'max:255'],
            'department' => ['nullable', 'in:Admin Department,Technical Department'], // Validate department
            'payroll_position' => ['nullable', 'in:Director IV,Chief Administrative Officer,Supervising Education Program Specialist,Education Supervisor II,Education Program Specialist II,Administrative Officer III,Administrative Assistant III,Administrative Aide VI,Administrative Aide III,Project Technical Staff III,Project Technical Staff II,Project Technical Staff I,Project Support Staff IV,Job Order'], // Validate payroll position
            'designation' => ['nullable', 'string', 'max:255'], // Validate designation
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
            // Save the user's updated information including new fields
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'employee_no' => $input['employee_no'],
                'birthdate' => $input['birthdate'],
                'gender' => $input['gender'],
                'marital_status' => $input['marital_status'],
                'address' => $input['address'],
                'department' => $input['department'], // Save department to the database
                'payroll_position' => $input['payroll_position'], // Save payroll position to the database
                'designation' => $input['designation'], // Save designation to the database
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
            'address' => $input['address'],
            'department' => $input['department'], // Save department
            'payroll_position' => $input['payroll_position'], // Save payroll position
            'designation' => $input['designation'], // Save designation
            'email_verified_at' => null,
        ])->save();

        // Send verification email if needed
        $user->sendEmailVerificationNotification();
    }
}
