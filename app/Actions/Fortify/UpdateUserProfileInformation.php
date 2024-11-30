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
            'gender' => ['nullable', 'in:Male,Female'], // Gender validation
            'marital_status' => ['nullable', 'in:Single,Married,Separated,Divorced,Widowed'], // Marital status validation
            'address' => ['nullable', 'string', 'max:255'],
            'department' => ['nullable', 'in:Admin Department,Technical Department'], // Department validation
            'payroll_position' => ['nullable', 'in:Director IV,Chief Administrative Officer,Supervising Education Program Specialist,Education Supervisor II,Education Program Specialist II,Administrative Officer III,Administrative Assistant III,Administrative Aide VI,Administrative Aide III,Project Technical Staff III,Project Technical Staff II,Project Technical Staff I,Project Support Staff IV,Job Order'], // Payroll position validation
            'designation' => ['nullable', 'string', 'max:255'], // Designation validation

            // New fields validation
            'place_of_assignment' => ['nullable', Rule::in(['Zamboanga City', 'Pagadian City'])],
            'office_email' => ['nullable', 'email', 'regex:/@ched\.gov\.ph$/'], // Office email (only accepts @ched.gov.ph)
            'mobile_number' => ['nullable', 'regex:/^\+63\d{10}$/'], // Mobile number validation for Philippines (+63 followed by 10 digits)

            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        // Handle photo update if provided
        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // Normalize the gender field to null if it's empty
        if (empty($input['gender'])) {
            $input['gender'] = null;
        }

        // Normalize the marital_status field to null if it's empty
        if (empty($input['marital_status'])) {
            $input['marital_status'] = null;
        }

        // Normalize the department field to null if it's empty
        if (empty($input['department'])) {
            $input['department'] = null;
        }

        // Normalize the payroll_position field to null if it's empty
        if (empty($input['payroll_position'])) {
            $input['payroll_position'] = null;
        }

        if (empty($input['payroll_position'])) {
            $input['payroll_position'] = null;
        }

        if (empty($input['place_of_assignment'])) {
            $input['place_of_assignment'] = null;
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
                'place_of_assignment' => $input['place_of_assignment'], // Save place of assignment
                'office_email' => $input['office_email'], // Save office email
                'mobile_number' => $input['mobile_number'], // Save mobile number
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
            'place_of_assignment' => $input['place_of_assignment'], // Save place of assignment
            'office_email' => $input['office_email'], // Save office email
            'mobile_number' => $input['mobile_number'], // Save mobile number
            'email_verified_at' => null,
        ])->save();

        // Send verification email if needed
        $user->sendEmailVerificationNotification();
    }
}
