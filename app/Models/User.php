<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
   use HasApiTokens;

   /** @use HasFactory<\Database\Factories\UserFactory> */
   use HasFactory;
   use HasProfilePhoto;
   use Notifiable;
   use TwoFactorAuthenticatable;

   protected $casts = [
      'birthdate' => 'date', // This will cast the birthdate to a Carbon date object
   ];

   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
      'name',
      'email',
      'password',
      'employee_no',
      'usertype',
      'birthdate',
      'gender',
      'marital_status',
      'address',
      'department',
      'payroll_position',
      'designation',
      'place_of_assignment',
      'office_email',
      'mobile_number',
      'tin',
      'gsis',
      'crn',
      'sss',
      'philhealth',
      'date_employed',
      'employment_status',

   ];


   /**
    * The attributes that should be hidden for serialization.
    *
    * @var array<int, string>
    */
   protected $hidden = [
      'password',
      'remember_token',
      'two_factor_recovery_codes',
      'two_factor_secret',
   ];

   /**
    * The accessors to append to the model's array form.
    *
    * @var array<int, string>
    */
   protected $appends = [
      'profile_photo_url',
   ];

   /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
   protected function casts(): array
   {
      return [
         'email_verified_at' => 'datetime',
         'password' => 'hashed',
      ];
   }

   /**
    * Check if the user is an admin.
    *
    * @return bool
    */
   public function isAdmin()
   {
      return $this->usertype === 'admin';
   }
}
