<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      // Create the users table
      Schema::create('users', function (Blueprint $table) {
         // Existing fields
         $table->id();
         $table->string('name');
         $table->string('email')->unique();
         $table->string('employee_no')->unique()->nullable();
         $table->string('usertype')->default('user');

         $table->date('birthdate')->nullable();
         $table->enum('gender', ['Male', 'Female'])->nullable()->default(null);
         $table->enum('marital_status', ['Single', 'Married', 'Separated', 'Divorced', 'Widowed'])->nullable()->default(null);
         $table->text('address')->nullable();

         $table->enum('department', ['Admin Department', 'Technical Department'])->nullable()->default(null);
         $table->enum('payroll_position', [
            'Director IV',
            'Chief Administrative Officer',
            'Supervising Education Program Specialist',
            'Education Supervisor II',
            'Education Program Specialist II',
            'Administrative Officer III',
            'Administrative Assistant III',
            'Administrative Aide VI',
            'Administrative Aide III',
            'Project Technical Staff III',
            'Project Technical Staff II',
            'Project Technical Staff I',
            'Project Support Staff IV',
            'Job Order'
         ])->nullable()->default(null);
         $table->string('designation')->nullable();

         // New fields
         $table->enum('place_of_assignment', [
            'Zamboanga City',
            'Pagadian City',
         ])->nullable()->default(null); // Place of assignment options

         $table->string('office_email')->unique()->nullable()->default(null); // New office email field (validated as @ched.gov.ph)
         $table->string('mobile_number')->nullable(); // New mobile number field

         // Add new fields for employee credentials and employment details
         $table->string('tin')->unique()->nullable(); // TIN, unique
         $table->string('gsis')->unique()->nullable(); // GSIS, unique
         $table->string('crn')->unique()->nullable(); // CRN, unique
         $table->string('sss')->unique()->nullable(); // SSS, unique
         $table->string('philhealth')->unique()->nullable(); // PhilHealth, unique

         $table->date('date_employed')->nullable(); // Date of employment
         $table->enum('employment_status', ['Active', 'Inactive'])->default('Active'); // Employment status dropdown

         // Additional fields
         $table->timestamp('email_verified_at')->nullable();
         $table->string('password');
         $table->rememberToken();
         $table->foreignId('current_team_id')->nullable();
         $table->string('profile_photo_path', 2048)->nullable();
         $table->timestamps();
      });

      // Create the password_reset_tokens table
      Schema::create('password_reset_tokens', function (Blueprint $table) {
         $table->string('email')->primary();
         $table->string('token');
         $table->timestamp('created_at')->nullable();
      });

      // Create the sessions table
      Schema::create('sessions', function (Blueprint $table) {
         $table->string('id')->primary();
         $table->foreignId('user_id')->nullable()->index();
         $table->string('ip_address', 45)->nullable();
         $table->text('user_agent')->nullable();
         $table->longText('payload');
         $table->integer('last_activity')->index();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('users');
      Schema::dropIfExists('password_reset_tokens');
      Schema::dropIfExists('sessions');
   }
};
